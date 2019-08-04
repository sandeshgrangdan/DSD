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
$email = $_SESSION['email'];

     $sel_sql ="SELECT * FROM user WHERE user_email = '$email'";
     if($run_sql = mysqli_query($conn, $sel_sql)){
       while($rows= mysqli_fetch_assoc($run_sql)){
         
         $user_f_name = $rows['user_f_name'];
         $user_l_name = $rows['user_l_name'];
         $user_gender = $rows['user_gender'];
         $user_phone_no = $rows['user_phone_no'];
         $role = $rows['role'];
         
         if(mysqli_num_rows($run_sql) == 1 ){
           if($rows['role'] == 'admin'){
             
           }
           else{
             header('Location: ../index.php');
           }
        
         }else{
           header('Location: ../index.php');
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
    <title>Admin Area | Dashboard</title>
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
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="pages.php">Category</a></li>
            <li><a href="posts.php">Posts</a></li>
            <li><a href="users.php">Users</a></li>
            <li class="active"><a href="profile.php">Profile</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Profile <small> Manage Your Site</small></h1>
          </div>
         <!--  <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active"><b>Profile</b></li>
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
              <a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge"><?php echo $total_post;?></span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Users <span class="badge"><?php echo $total_user;?></span></a>
              <a href="profile.php" class="list-group-item active"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile <span class="badge"></span></a>
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
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $total_user;?></h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  <?php echo $total_category;?></h2>
                    <h4>Pages</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  <?php echo $total_post;?></h2>
                    <h4>Posts</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  <?php echo $total_pro;?></h2>
                    <h4>Product</h4>
                  </div>
                </div>
              </div>
              </div>

            <div class="col-lg-12">
               
               <div class="panel panel-primary">
                 <div class="panel-heading">
               <?php if (isset($_SESSION['picture']))
                {           
                 ?>
                   <div class="col-md-3">
                     <img src="<?php echo $_SESSION['picture'] ?>" width="100%" class="img-thumbnail">
                   </div>
                   <?php
                    }else{
                   ?>
                        <div class="col-md-3">
                     <img src="../images/avatar.png" width="100%" class="img-thumbnail">
                   </div>
                   <?php 
                      }
                   ?>
                   
                     <div class ="col-md-7">
                         <h3><u><?php echo ucfirst($user_f_name).' '.ucfirst($user_l_name);?></u></h3>
                     <p><i class="glyphicon glyphicon-phone"></i> <?php echo $user_phone_no;?></p>
                     <p><i class="glyphicon glyphicon-road"></i> <?php echo $role;?></p>
                     <p><i class="glyphicon glyphicon-envelope"></i> <?php echo $_SESSION['email'];?></p>
                     
                       </div>
                       
                   <div class="clearfix">
                   </div>
               </div>
               </div>
         </div>
         
         <div class="col-md-4">
           <div class="panel panel-default">
             <div class="panel-heading">
               <table class="table table-condensed">
                 <tbody>
                   <tr>
                     <th>Gender</th>
                     <td><?php echo ucfirst($user_gender);?></td>
                   </tr>
                   <tr>
                     <th>First Name</th>
                     <td><?php echo ucfirst($user_f_name);?></td>
                   </tr>
                   <tr>
                     <th>Last Name</th>
                     <td><?php echo ucfirst($user_l_name);?></td>
                   </tr>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
         
         <div class="col-md-3">
           <div class="panel panel-default">
             <div class="panel-heading">
               <table class="table table-condensed">
                 <tbody>
                  <?php
                  $num = 1; 
                  $sel_sql = "SELECT * FROM tbl_product WHERE author = '$_SESSION[email]' ORDER BY id DESC LIMIT 3";
                     $run_sql = mysqli_query($conn, $sel_sql);
                     while($rows = mysqli_fetch_assoc($run_sql)) { ?>
                   <tr>
                    <td width="5%"><?php echo $num; ?></td>
                     <td>
                       <a href="product.php"><?php echo ucfirst($rows['name']); ?></a>
                     </td>
                   </tr>

                   <?php 
                   $num++;
                      }
                   ?>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
         <div class="col-md-5">
           <div class="panel panel-default">
             <div class="panel-heading">
               <h4>About Me</h4>
               <!-- <p><?php echo $user_about_me;?></p> -->
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
