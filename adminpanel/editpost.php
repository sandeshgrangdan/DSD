<?php session_start();

include'../includes/db.php';
 if(isset($_COOKIE['email']) && $_COOKIE['email']!= null)
{
     $sql = "SELECT * from user WHERE user_email = '$_COOKIE[email]'";
    if($result = mysqli_query($conn,$sql)){        
             if(mysqli_num_rows($result) == 1){
                while($rows = mysqli_fetch_assoc($result)){
                      $_SESSION['email'] = $rows['user_email'];
                      $_SESSION['gender'] = $rows['gender'];
                      $_SESSION['familyName'] = $rows['user_l_name'];
                      $_SESSION['givenName'] = $rows['user_f_name'];
                      $_SESSION['role'] = $rows['role'];

                      if($rows['role'] != "admin")
                        header('Location: ../index.php');
                      else{
                        
                      }
                      
                }
             }
    }
}
   
   $error ='';
   
   if(isset($_POST['submit_post'])){
     $title = strip_tags($_POST['title']);
     $date = date('Y-m-d h:i:s');
     $des = strip_tags($_POST['editor1']);
     
     if(isset($_FILES['image'])){
       $image_name = $_FILES['image']['name'];
       $image_tmp = $_FILES['image']['tmp_name'];
       $image_size = $_FILES['image']['size'];
       $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
       $image_path = '../images/'.$image_name;
       $image_db_path = 'images/'.$image_name;
       
       if($image_size < 3000000){
         if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif' ){
          if(move_uploaded_file($image_tmp,$image_path)){
            $ins_sql ="UPDATE post SET  title = '$title', discription = '$_des', image = '$image_db_path', status = '$_POST[status]', category = '$_POST[category]', dates = '$date' , author = '$_SESSION[email]' WHERE id = $_GET[id]";
            if(mysqli_query($conn, $ins_sql)){
              $error = '
                  <div class="alert alert-success alert-dismissible">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Updated With New Images;
                    <a href="posts.php">Click me to Continue</a>
                  </div>
            ';
            }
            else {
              $error = '<div class="alert alert-danger">FUCK the Query is not working</div>';
            }
          }else{
            $error  = '<div class="alert alert-danger">Sorry, Unfortunately Image has not been upload!</div>';
          }
         }else{
           $ins_sql ="UPDATE post SET  title = '$title', discription = '$des', status = '$_POST[status]', category = '$_POST[category]', dates = '$date' , author = '$_SESSION[email]' WHERE id = $_GET[id]";
            if(mysqli_query($conn, $ins_sql)){
                $error = '
                <div class="alert alert-success alert-dismissible">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Updated Without Image;
                    <a href="posts.php">Click me to Continue</a>
                  </div>
             ';
            }
         }

         
         
       }else {
         $error = '<div class="alert alert-danger">Image File is much bigger then Expect bitch!</div>';
       }
       
     }else {
       $ins_sql ="UPDATE post SET (title, discription, status, category, date, author) VALUES 
            ('$title', '$_POST[editor1]', '$_POST[status]', '$_POST[category]', '$date', '$_SESSION[email]') WHERE id= $_GET[id]";
            if(mysqli_query($conn, $ins_sql)){
              header('Location: view_post.php');

            }
            else {
              $error = '<div class="alert alert-danger">FUCK the Query is not working</div>';
            }
     }
   }

  $sql ="SELECT * FROM user";
  $run = mysqli_query($conn, $sql);
  $total_user = mysqli_num_rows($run);

  $sql ="SELECT * FROM tbl_product";
  $run = mysqli_query($conn, $sql);
  $total_pro = mysqli_num_rows($run);

  $sql ="SELECT * FROM post";
  $run = mysqli_query($conn, $sql);
  $total_post = mysqli_num_rows($run);

  $sql ="SELECT * FROM category";
  $run = mysqli_query($conn, $sql);
  $total_category = mysqli_num_rows($run);
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Posts</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AdminStrap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="pages.php">Category</a></li>
            <li class="active"><a href="posts.php">Posts</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="transaction.php">Transaction</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php">Welcome, <?php echo ucfirst($_SESSION['givenName']);  ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Posts<small>Manage Blog Posts</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Dashboard</a></li>
          <li class="active">Posts</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item ">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="pages.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Category <span class="badge"><?php echo $total_category;?></span></a>
              <a href="posts.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge"><?php echo $total_post;?></span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Users <span class="badge"><?php echo $total_user;?></span></a>
              <a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile <span class="badge"></span></a>
              <a href="product.php" class="list-group-item"><span  class="fa fa-product-hunt " aria-hidden="true" style="font-size: 17px;"></span> Product <span class="badge"><?php echo $total_pro;?></span></a>
              <a href="transaction.php" class="list-group-item"><span  class="fa fa-exchange" aria-hidden="true" style="font-size: 15px;"></span> Transaction <span class="badge"><?php echo $total_pro;?></span></a>
            </div>

            <div class="well">
              <h4>Disk Space Used</h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                      60%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                    40%
            </div>
          </div>
            </div>
          </div>
               <div class="col-lg-9">
     <?php
         if(isset($_GET['edit_id'])){
         
       
       $sql = "SELECT * FROM post WHERE id = $_GET[edit_id]";
       $run = mysqli_query($conn, $sql);
       while($rows = mysqli_fetch_assoc($run)){ ?>
       <div class="page-header"><h1><?php echo $rows['title'];?></h1></div>
           <div class="container-fluid">
           <form class="form-horizontal" action="editpost.php?id=<?php echo $rows['id'];?>" method="post" enctype="multipart/form-data">
               <img src="../<?php echo $rows['image'];?>" width="100px">
            <div class="form-group">
               <label for="image">Upload an Image</label>
               <input id="image" type="file"  name="image" class="btn btn-success">
             </div>
             <div class="form-group">
               <label for="title">Title</label>
               <input id="title" type="text" name="title" value="<?php echo $rows['title'];?>" class="form-control" required>
             </div>
             <div class="form-group">
               <label for="category">Category</label>
                 <select id="category" name="category"class="form-control" required>
                     <option value="<?php echo $rows['category'];?>">Select Category</option>
                  <?php 
                     $sel_sql = "SELECT * FROM category";
                     $run_sql = mysqli_query($conn, $sel_sql);
                     while($c_rows = mysqli_fetch_assoc($run_sql)){
                       if($c_rows['category_name'] == 'home'){
                         continue;
                       }
                       echo '<option value="'.$c_rows['c_id'].'">'.ucfirst($c_rows['category_name']).'</option>';
                     }
                  ?>
                 </select>
               </div>
             <div class="form-group">
               <label for="description">Description</label>
               <textarea id="description"  class="form-control" rows="4" name="editor1" required><?php echo $rows['discription'];?></textarea>
             </div>
             <div class="form-group">
               <label for="status" value="<?php echo $rows['status']?>">Status</label>
               <select id="status" name="status" class="form-control">
                 <option value="draft">Draft</option>
                 <option value="published">Published</option> 
               </select>
             </div>
             <div class="form-group">
               <input type="submit" name="submit_post"  class="btn btn-danger btn-block">
             </div>
             
           </form>
         </div>
     </div>
       
       <?php } 
       }else {
        echo $error;
       }
       
     ?>        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="posts.php" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Post</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="image">Upload the Image</label>
          <input id="image" type="file" name="image" class="btn btn-success" required>
        </div>
        <div class="form-group">
               <label for="title">Title</label>
               <input id="title" type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
               <label for="category">Category</label>
                 <select id="category" name="category"class="form-control" required>
                     <option value="">Select Any Category</option>
                  <?php 
                     $sel_sql = "SELECT * FROM category";
                     $run_sql = mysqli_query($conn, $sel_sql);
                     while($rows = mysqli_fetch_assoc($run_sql)){
                       if($rows['category_name'] == 'home'){
                         continue;
                       }
                       echo '<option value="'.$rows['c_id'].'">'.ucfirst($rows['category_name']).'</option>';
                     }
                  ?>
                 </select>
          </div>
        <div class="form-group">
               <label for="description">Description</label>
               <textarea id="description" class="form-control" name="editor1" required></textarea>
             </div>
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div> -->
        <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control">
                 <option value="draft">Draft</option>
                 <option value="published">Published</option> 
               </select>
             </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
        <div class="form-group">
               <input type="submit" name="submit_post" class="btn btn-danger btn-block">
        </div>
      </div>
    </form>
    </div>
  </div>
</div>


    <div class="modal fade" id="addPage1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div>
        <div class="form-group">
          <label>Meta Tags</label>
          <input type="text" class="form-control" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <input type="text" class="form-control" placeholder="Add Meta Description...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
