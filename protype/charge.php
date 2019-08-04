<?php
session_start();
  require_once('stripe/vendor/autoload.php');
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');

  \Stripe\Stripe::setApiKey('sk_test_zOFKtMY6DRKWVVBPr1tFRohx');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $_SESSION["givenName"];
 $last_name = $_SESSION["familyName"];
 $email = $POST['email'];
 $token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $_SESSION["full_price"]*100,
  "currency" => "usd",
  "description" => $_SESSION['description'],
  "customer" => $customer->id
));

// Customer Data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

//Instantiate Customer
$customers = new Customer();

// Add Customer To DB
$customers->addCustomer($customerData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

$mailto = $_SESSION['email'];
    $mailSub = "Order Payment";
    $mailMsg = 'Thank you for using Dherai Sasto Deal.
                 Your Product is:'.$_SESSION['description'];
   require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "dheraisastodeal@gmail.com";
   $mail ->Password = "dheraisastodeal123";
   $mail ->SetFrom("dheraisastodeal@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Send";
       header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'&amount='.$charge->amount);
   }
   else
   {
       header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'&amount='.$charge->amount);
       echo "Mail Sent";
   }

// Redirect to success
