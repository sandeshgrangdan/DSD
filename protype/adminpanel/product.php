<?php
  include '../includes/db.php';
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
  $data = array();
  $name = $_SESSION['email'];
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
          if(move_uploaded_file($image_tmp,'../../images/'.$image_path)){
            $ins_sql ="INSERT INTO tbl_product (c_id, name, image, price, display,author) VALUES 
            ( '$_POST[category]', '$title', '$image_db_path','$_POST[price]','$_POST[display]','$_SESSION[email]')";
            if(mysqli_query($conn, $ins_sql)){
              $error ='<div class="alert alert-success">Product is Added '.$title.'</div>';
            }
            else 
              $error = '<div class="alert alert-danger"> Query is not working</div>';
          }else
            $error  = '<div class="alert alert-danger">Sorry, Unfortunately Image has not been upload!</div>';
         }else
           $error= '<div class="alert alert-danger">Image Formate was not Correct</div>';
       }else 
         $error = '<div class="alert alert-danger">Image File is much bigger then Expect bitch!</div>';
     }else
      $error = '<div class="alert alert-danger">The Query is not working</div>';
   }

   if(isset($_GET['new_status'])){
     $new_status = $_GET['new_status'];
     $sql = "UPDATE tbl_product SET display='$new_status' WHERE id = $_GET[id]";
       if($run = mysqli_query($conn, $sql)){
       $error = '<div class="alert alert-success"><h3>Updated Status to '.ucfirst($new_status).'f </h3></div>';
     }
   }

   if(isset($_GET['del_id'])){
     $del_id = $_GET['del_id'];
     $name = ucfirst($_GET['name']);
     $sql =" DELETE FROM tbl_product WHERE id = '$del_id'";
     if($run = mysqli_query($conn, $sql)){
       $error = '<div class="alert alert-danger"><h3>Sucessfuly Deleted '.$name.' Product</b></h3></div>';
     }
   }

  $sql_user ="SELECT * FROM user";
  $run_u = mysqli_query($conn, $sql_user);
  $total_user = mysqli_num_rows($run_u);

  $sql_tp ="SELECT * FROM tbl_product";
  $run_tp = mysqli_query($conn, $sql_tp);
  $total_pro = mysqli_num_rows($run_tp);

  $sql_p ="SELECT * FROM transactions";
  $run_p = mysqli_query($conn, $sql_p);
  $total_post = mysqli_num_rows($run_p);

  $sql_c ="SELECT * FROM category";
  $run_c = mysqli_query($conn, $sql_c);
  $total_category = mysqli_num_rows($run_c);

  
  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Product</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../../../font-awesome/css/font-awesome.min.css">
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
            <li><a href="users.php">Users</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li class="active"><a href="product.php">Product</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Product <small> Manage Your Site</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button"data-toggle="modal" data-target="#addPage" aria-haspopup="true" aria-expanded="true">
                <b>Add Product</b>
                <span class="caret"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Product</li>
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
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Users <span class="badge"><?php echo $total_user;?></span></a>
              <a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile <span class="badge"></span></a>
              <a href="product.php" class="list-group-item  active main-color-bg"><span  class="fa fa-product-hunt " aria-hidden="true" style="font-size: 17px;"></span> Product <span class="badge"><?php echo $total_pro;?></span></a>
              <a href="transaction.php" class="list-group-item"><span  class="fa fa-exchange" aria-hidden="true" style="font-size: 15px;"></span> Transaction <span class="badge"><?php echo $total_post;?></span></a>
            </div>
       <?php include'include/bandwidth.php';?>

          </div>
            
            <!-- Website Overview -->


           <div class="col-lg-9">
            <?php echo $error;?>
                    <div class="panel panel-primary">
                       <div class="panel-heading main-color-bg"><h3>Latest Post</h3></div>
                     <div class=" panel-body">
                       <table class="table table-striped">
                         <thead>
                            <tr>
                             <th>S.No</th>
                             <th>Name</th>
                             <th>Image</th>
                             <th>Price</th>
                             <th>Delete</th>
                             <th>Display</th>
                             <th>Edit</th>
                             <th>Edit Display</th>
                            </tr>

                             
                         </thead>
                         <tbody>
                         <?php
                           $number = 1;
                           $query = "SELECT * FROM tbl_product WHERE author = '$_SESSION[email]'";
                           $result = mysqli_query($conn, $query);
                           if(mysqli_num_rows($result) > 0){
                              while($rows = mysqli_fetch_array($result))
                                  { 
                                    if($rows['display'] == "on"){
                                           $boolen = "ok";
                                    }else
                                    {
                                             $boolen = "remove";  
                                    }
                                     echo'
                                       <tr>
                                         <td>'.$number.'</td>
                                         <td>'.$rows['name'].'</td>
                                         <td>'.($rows['image'] == '' ? 'No Image' : '<img src="../../images/'.$rows['image'].'" width="50px">').'</td>
                                         <td>'.($rows['price']).'</td>
                                         <td><a href="product.php?del_id='.$rows['id'].'&name='.$rows['name'].'" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">  Delete</i></a></td>
                                         <td><span class="glyphicon glyphicon-'.$boolen.'" aria-hidden="true"></span></td>
                                        
                                        <td><a href="editproduct.php?edit_id='.$rows['id'].'&name='.$rows['name'].'" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"> Edit</i></a></td>  
                                        <td>'.($rows['display'] == 'of' ? '<a href="product.php?new_status=on&id='.$rows['id'].'" class="btn btn-primary btn-xs">ON</a>' : 
                                         '<a href="product.php?new_status=of&id='.$rows['id'].'" class="btn btn-info btn-xs">OFF</a>').'
                                        </td>
                                        </tr>   
                                     ';
                                 $number++;
                               }
                             }
                             ?>
                             </tbody>
                           </table>
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
               <input id="title" type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="image">Upload the Image</label>
          <input id="image" type="file" name="image" class="btn btn-success" required>
        </div>
        <div class="form-group">
               <label for="title">Price</label>
               <input id="title" type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
          <label id="display">Display</label>
          <select id="display" name="display" class="form-control" required>
            <option value="on">On</option>
            <option value="of">Off</option>
          </select>
       <div class="form-group">
         <label for="descripion">Description</label>
         <input id="Description" type="text" name="Description" class="form-control" required>
       </div>
<div class="form-group">
       <label for="info">Information</label>
       <input id="info" type="text" name="info" class="form-control" required>
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
