<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="CSS/style.css">
       <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" href="../bootstrap-social/bootstrap-social.css">
  <title>Pay Page</title>
</head>
<body>
  <br><br>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="price"><span class="currency"></span>
<?php
            session_start();
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            } 
            $_SESSION['total'] = $total*100;
            $desc = "";
            echo '$'.$total;
?>
                        </h3>
                    </div>
                    <div class="card-block text-center">
                      <?php
                            foreach($_SESSION["shopping_cart"] as $keys => $values){
                              $desc = $desc.' '.ucfirst($values['item_name']);
                              echo '<div class="card-title"><h4>
                            '.ucfirst($values['item_name']).'</h4>
                                  </div> ';
                            } 
                            $_SESSION['description'] = $desc;
                      ?>
                        

                        <!-- PASTE HERE YOUR FORM CODE FROM PAYPAL -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
  <div class="container">
    <form action="charge.php" method="post" id="payment-form">
      <div class="form-row">
       <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name" value="<?php echo $_SESSION['givenName'];?>">
       <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name" value="<?php echo $_SESSION['familyName'];?>">
       <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address" value="<?php echo $_SESSION['email'];?>">
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Submit Payment</button>
    </form>
  </div>
  <script src="../bootstrap/dist/js/jquery-slim.min.js"></script>
    <script src="../bootstrap/dist/js/popper.min.js"></script> 
     <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/charge.js"></script>
</body>
</html>