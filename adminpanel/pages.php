<?php 
     include'../includes/db.php';
     session_start();

  // if (!isset($_SESSION['access_token'])) {
  //   header('Location: ../index.php');
  //   exit();
  // }
   
   $result ='';
   if(isset($_POST['submit_category'])){
     strip_tags($_POST['category']);
     $sql = "INSERT INTO category (category_name) VALUE ('$_POST[category]')";
     if(mysqli_query($conn,$sql)){
       $result= '<div class="alert alert-success"><h3>you created new category '.$_POST['category'].'</h3></div>';
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
    <title>Admin Area | Category</title>
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
          <a class="navbar-brand" href="#">Dherai Sasto Deal</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Category</a></li>
            <li class="active"><a href="pages.php">Category</a></li>
            <li><a href="posts.php">Posts</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Category<small> Manage Site Pages</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="modal" data-target="#addPage" aria-haspopup="true" aria-expanded="true">
                <b>New Category</b>
              </button>
              
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Category</a></li>
          <li class="active">Category Detail</li>
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
              <a href="pages.php" class="list-group-item active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Category <span class="badge"><?php echo $total_category;?></span></a>
              <a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge"><?php echo $total_post;?></span></a>
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
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Category</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Pages...">
                      </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                           <th>S.No</th>
                           <th>S.No</th>
                           <th>Category Name</th>
                           <th>Edit</th>                  
                           <th>Delete</th>
                      <?php
                         $sql ="SELECT * FROM category";
                         $run = mysqli_query($conn,$sql);
                         $num = 1;
                         while($rows = mysqli_fetch_assoc($run)){
                           if( $rows['category_name'] == 'home'){
                                continue;
                           } else {
                               echo '
                                                        
                                 <tr>
                                  
                                   <td>'.$num.'</td>
                                   <td>'.$rows['c_id'].'</td>
                                   <td>'.ucfirst($rows['category_name']).'</td>
                                   <td><a href="editcategory.php?cat_id='.$rows['c_id'].'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
                                   <td><a href="category_list.php?del_id='.$rows['c_id'].'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i>  Delete</a></td>
                                  
                                 </tr>
                                 '; 
                                 $num++;
                              }
                         }                             
                      ?>  
                    </table>
              </div>
              </div>

          </div>
        </div>
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
      <form method="post" action="pages.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Category</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
               <label for="cstegory">Title</label>
               <input id="cstegory" type="text" name="category" class="form-control">
             </div>
      <div class="modal-footer">
        <div class="form-group">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        <div class="form-group">
               <input type="submit" name="submit_category" class="btn btn-success btn-block">
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
