<?php
$admin = "";
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


  // include '../config.php';
  // if ( !isset($_SESSION['access_token']) ) {
  //       header('Location: ../index.php?from_accesstoken');
  //       exit();

  //  }else{}
    

  include '../includes/db.php';
  $data = array();
  $name = "sandesh@gmail.com";
  $error ='';

  $user = array();
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
    <title>Admin Area | Dashboard</title>
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
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="pages.php">Category</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="transaction.php">Transaction</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php">Welcome, <?php echo ucfirst($_SESSION['givenName']);  ?></a></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Add Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="product.php">Product</a>Product</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="pages.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Category <span class="badge"><?php echo $total_category;?></span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Users <span class="badge"><?php echo $total_user;?></span></a>
              <a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile <span class="badge"></span></a>
              <a href="product.php" class="list-group-item"><span  class="fa fa-product-hunt " aria-hidden="true" style="font-size: 17px;"></span> Product <span class="badge"><?php echo $total_pro;?></span></a>
              <a href="transaction.php" class="list-group-item"><span  class="fa fa-exchange" aria-hidden="true" style="font-size: 15px;"></span> Transaction <span class="badge"><?php echo $total_post;?></span></a>
            </div>

            <?php include'include/bandwidth.php';?>
          </div>
          <div class="col-md-9">
            <?php echo $error;?>
            <!-- Website Overview -->
            <?php include 'include/overview.php';?>

              <!-- Latest Users -->
              <div class="col-lg-8">
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Latest Users</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Roles</th>
                        
                      </tr>
                      </thead>
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
                         <td>'.$d['role'].'</td>
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

              <div class="col-lg-4">
               
               <div class="panel panel-primary">
             <div class="panel-heading main-color-bg">
               <div class ="col-md-8">
                <div class="page-header"><h4><?php echo ucfirst($_SESSION['givenName']).' '.ucfirst($_SESSION['familyName']); ?></h4></div> 
                </div>
                <?php if( isset($_SESSION['picture']) ) { ?>
                  <div>
                     <img src="<?php echo $_SESSION['picture'];  ?>" width="33%" class="img-circle pull-right">
                  </div>
                  <?php 
                }else{
                  echo ' <div>
                     <img src="../../images/avatar.png" width="33%" class="img-circle pull-right">
                  </div>';
                }
                ?>
                
                   <table class="table table-condensed">
                      <tbody>
                         <tr>
                           <th>Role:</th>
                           <td>Admin</td>
                         </tr>
                         <tr>
                           <th>Email:</th>
                           <td><?php echo $_SESSION['email'];  ?></td>
                         </tr>
                         <tr>
                           <th>Gender:</th>
                           <td><?php echo $_SESSION['gender'];  ?></td>
                         </tr> 
                         <tr>
                           <th>Country:</th>
                           <td>Nepal</td>
                         </tr>
                        
                      
                      </tbody> 
                   </table>
                
                
               </div>
          </div>
        </div>
        
      
          <div class="clearfix"></div>
          </div>
           <div class="col-lg-12">
         <div class="panel panel-primary">
                       <div class="panel-heading main-color-bg"><h3>Latest Product</h3></div>
                     <div class=" panel-body">
                       <table class="table table-striped">
                         <thead>
                            <tr>
                             <th>S.No</th>
                             <th>Name</th>
                             <th>Image</th>
                             <th>Price</th>
                            </tr>

                             
                         </thead>
                         <tbody>
                         <?php
                           $number = 1;
                           $query = "SELECT * FROM tbl_product ORDER BY id DESC LIMIT 5 ";
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
      <div class="col-lg-12">
       <div class="panel panel-primary">
           <div class="panel-heading main-color-bg"><h3>Latest Category</h3></div>
         <div class=" panel-body">
          <table class="table table-striped table-hover">
                           <th>S.No</th>
                           <th>S.No</th>
                           <th>Category Name</th>
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
      <p>Dherai Sasto Deal</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="index.php" method="post" enctype="multipart/form-data">
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
