<?php
  include '../includes/db.php';
  $data = array();
  session_start();

  if( isset($_SESSION['role']) ) {
           if( $_SESSION['role'] == "subscriber" ) {
             header('Location : ../index.php?fromrole');
             exit();
           }
  }else{
    header('Location : ../index.php?nosession');
    exit();
  }
  $name = $_SESSION['email'];
  $result = '';
   if(isset($_GET['new_statu'])){
     $new_statu = $_GET['new_statu'];
     $sql = "UPDATE user SET role='$new_statu' WHERE user_id = $_GET[i]";
       if($run = mysqli_query($conn, $sql)){
       $result = '<div class="alert alert-success"><h3>We Upadated the Status of User </h3></div>';
     }
   }
   
  $error ='';
   if(isset($_POST['submit_post'])){
     $title = strip_tags($_POST['title']);
     $date = date('Y-m-d h:i:s');
     if(isset($_FILES['image'])){
       $image_name = $_FILES['image']['name'];
       $image_tmp = $_FILES['image']['tmp_name'];
       $image_size = $_FILES['image']['size'];
       $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
       $image_path = $image_name;
       $image_db_path = $image_name;
       
       if($image_size < 3000000){
         if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif' ){
          if(move_uploaded_file($image_tmp,$image_path)){
            $ins_sql ="INSERT INTO tbl_product (c_id, name, image, price) VALUES 
            ( '$_POST[category]', '$_POST[name]', '$image_db_path','$_POST[price]')";
            if(mysqli_query($conn, $ins_sql)){
              $error ='<div class="alert alert-danger">Omg Product is Added</div>';
            }
            else {
              $error = '<div class="alert alert-danger">FUCK the Query is not working</div>';
            }
          }else{
            $error  = '<div class="alert alert-danger">Sorry, Unfortunately Image has not been upload!</div>';
          }
         }else{
           $error= '<div class="alert alert-danger">Image Formate was not Correct</div>';
         }
         
         
       }else {
         $error = '<div class="alert alert-danger">Image File is much bigger then Expect bitch!</div>';
       }
       
     }else {             

      $error = '<div class="alert alert-danger">FUCK the Query is not working</div>';
            
     }
   }
  $sql ="SELECT * FROM user";
  $run = mysqli_query($conn, $sql);
  $total_user = mysqli_num_rows($run);

  $sql ="SELECT * FROM tbl_product";
  $run = mysqli_query($conn, $sql);
  $total_pro = mysqli_num_rows($run);

  $sql ="SELECT * FROM transactions";
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
    <title>Admin Area | User</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../../font-awesome/css/font-awesome.min.css">
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
          <a class="navbar-brand" href="index.php">Dherai Sasto Deal</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="pages.php">Category</a></li>
            <li class="active"><a href="users.php">Users</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User <small>Manage Your Site</small></h1>
          </div>
          <div class="col-md-2">
           <!--  <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Add Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Post</a></li>
                <li><a href="new_category.php">Add category</a>Product</li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">User Details</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="pages.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Category <span class="badge"><?php echo $total_category;?></span></a>
              <a href="users.php" class="list-group-item  active "><span class="fa fa-users" style="font-size: 15px;" aria-hidden="true"></span> Users <span class="badge"><?php echo $total_user;?></span></a>
              <a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile <span class="badge"></span></a>
              <a href="product.php" class="list-group-item"><span  class="fa fa-product-hunt " aria-hidden="true" style="font-size: 15px;"></span> Product <span class="badge"><?php echo $total_pro;?></span></a>
              <a href="transaction.php" class="list-group-item"><span  class="fa fa-exchange" aria-hidden="true" style="font-size: 15px;"></span> Transaction <span class="badge"><?php echo $total_post;?></span></a>
            </div>

            <?php include'include/bandwidth.php';?>

          </div>
          <div class="col-md-9">
            <?php echo $error;
            echo $result;?>
            <!-- Website Overview -->
             <?php include 'include/overview.php';?>

        <div class="panel panel-primary">
           <div class="panel-heading main-color-bg"><h3>Latest Post</h3></div>
           <div class=" panel-body">
              <div class="row">
                  <div class="col-md-12">
                      <input class="form-control" type="text" placeholder="Filter User...">
                         
                        <table class="table table-striped table-hover">
                      <tr>
                        <b>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Roles</th>
                        <th>Change Role</th>
                        <th>Delete Profile</th>
                        <th>View Profile</th>
                         </b>
                      </tr>
                      <tbody>                      <?php
                             $sql = "SELECT * FROM user LIMIT 5";
                           $run = mysqli_query($conn, $sql);
                           $num = 1;
                           while($rows = mysqli_fetch_assoc($run)){
                            array_push($data, $rows);
                           }
                           foreach ($data as $d) {
                             echo '
                              <tr>
                                 <td>'.$num.'</td>
                                 <td>'.$d['user_f_name'].' '.$rows['user_l_name'].'</td>
                                 <td>'.$d['user_email'].'</td>
                                 <td>'.$d['user_phone_no'].'</td>
                                 <td>'.$d['role'].'</td>';

                                  if ($d['user_email'] != "sandesht801@gmail.com" ) {
                                    echo '<td>'.($d['role'] == 'admin' ? '<a href="users.php?new_statu=subscriber&i='.$d['user_id'].'" class="btn btn-primary btn-xs">Subscriber</a>' : 
                                    '<a href="users.php?new_statu=admin&i='.$d['user_id'].'" class="btn btn-info btn-xs">Admin</a>').'
                                    </td>';
                                  }else
                                    echo '<td></td>';

                                  echo '<td><a href="users.php?del_id='.$d['user_id'].'" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
                               <td><a href="users.php?edit_id='.$d['user_id'].'" class="btn btn-sucess btn-xs"><i class="fa fa-user" style"font-size:20px;"></i> View Profile</a></td>
                               </tr>
                              ';
                              $num++;
                           }
                        ?>
                      </tbody>       

                    </table>
                         
                      </div>
             </div>
           
           </div>
        </div>
     </div>
   </div>
 </section>
    

    <footer id="footer">
      <p>Dherai Sasto Deal</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="product.php" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Post</h4>
      </div>
      <div class="modal-body">
        
        
        <div class="form-group">
               <label for="category">Category</label>
                 <select id="category" name="category" class="form-control" required>
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
               <label for="title">Name</label>
               <input id="title" type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="image">Upload the Image</label>
          <input id="image" type="file" name="image" class="btn btn-success" required>
        </div>
        <div class="form-group">
               <label for="title">Price</label>
               <input id="title" type="number" name="price" class="form-control" required>
        </div>
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div> -->
      
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
