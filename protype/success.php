<?php
session_start();
unset($_SESSION["shopping_cart"]);
  if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $_SESSION['c_id'] = $_GET['tid'];
    $amt = $_GET['amount']/100;
  } else {
    header('Location: index.php');
  }

  $invoice =  "
        TransactionID -> ".$GET['tid']."
        <br>Product -> ".$GET['product']."
        <br>Amount -> $".number_format($amt,3)."
        <br>Email -> ".$_SESSION['email'];

//         $mailto = $_SESSION['email'];
//           $mailSub = "Please Check Your Invoice";
//          require '../PHPMailer/PHPMailerAutoload.php';
//          $mail = new PHPMailer();
//          $mail ->IsSmtp();
//          $mail ->SMTPDebug = 0;
//          $mail ->SMTPAuth = true;
//          $mail ->SMTPSecure = 'ssl';
//          $mail ->Host = "smtp.gmail.com";//smtp.gmail.com
//          $mail ->Port = 465; // or  465
//          $mail ->IsHTML(true);
//          $mail ->Username = "dheraisastodeal@gmail.com";
//           $mail ->Password = "dheraisastodeal123";
//           $mail ->SetFrom("dheraisastodeal@gmail.com");
//         // $mail ->addAttachment('walpaper/concert.jpg');
//          $mail ->Subject = $mailSub;
//          $mail ->Body = "
//              <body>
//             <div class='email-background' style='background: #eeeeee;padding: 10px;'>
//               <div class='pre-header' style='max-width: 500px;background: #eeeeee;font-family: sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px;text-align: center;color: #eeeeee;font-size: 5px;'>
//                   Please Check Your Invoice
//               </div>
//               <div class='email-container' style='max-width: 500px;background: white;font-family: sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px;text-align: center;'>
//                 <h1>Please check your invoice! <img src='https://i.postimg.cc/9FGBbr4h/DSD.png' style='max-width: 50px;border-radius: 50%;display: block;margin-left: auto;margin-right: auto;'></h1>
//               </div>
//               <br>
              
//               <div class='footer-junk' style='text-align: center;'> 
//                     <input type='hidden' value='$invoice' placeholder='Enter your text to be put into the QR Code' id='text-input' >
//                   <canvas id='qrcode-canvas' style='padding:1em; background-color:#E8E8E8'></canvas>
//                   <svg id='qrcode-svg' style='width:30em; height:30em; padding:1em; background-color:#E8E8E8'>
//                     <rect width='100%' height='100%' fill='#FFFFFF' stroke-width='0'></rect>
//                     <path d=' fill='#000000' stroke-width='0'></path>
//                   </svg>
//                   <input type='hidden' name='errcorlvl' id='errcorlvl-low' checked='checked'><label for='errcorlvl-low'></label>
//                   <input type='hidden' name='errcorlvl' id='errcorlvl-medium'><label for='errcorlvl-medium'></label>
//                   <input type='hidden' name='errcorlvl' id='errcorlvl-quartile'><label for='errcorlvl-quartile'></label>
//                   <input type='hidden' name='errcorlvl' id='errcorlvl-high'><label for='errcorlvl-high'></label>
//                   <input type='hidden' name='output-format' id='output-format-bitmap' checked='checked'>
//                   <input type='hidden' name='output-format' id='output-format-vector'><label for='output-format-vector'></label>
//                   <input type='hidden' value='4' min='0' max='100' step='1' id='border-input' style='width:4em'>
//                   <span id='scale-row'></span>
//                   <input type='hidden' value='8' min='1' max='30' step='1' id='scale-input' style='width:4em'>
//                   <input type='hidden' value='1'  min='1' max='40' step='1' id='version-min-input' style='width:4em' oninput='app.handleVersionMinMax('min');'>,
//                   <input type='hidden' value='40' min='1' max='40' step='1' id='version-max-input' style='width:4em' oninput='app.handleVersionMinMax('max');'>
//                   <input type='hidden' value='-1' min='-1' max='7' step='1' id='mask-input' style='width:4em'>
//                   <input type='hidden' checked='checked' id='boost-ecc-input'>
//                   <input type='hidden' id='statistics-output' style='white-space:pre'>
//                   <span id='svg-xml-row'></span>
//                   <input type='hidden' id='svg-xml-output'> 
//               </div>
//               <p style='margin: 20px;font-size: 18px;font-weight: 300;line-height: 1.5;color: #666666;text-align: center;'>Dherai Sasto Deal(DSD) send your invoice in QR code for security features,
//               Thank You!</p>
//               <div class='cat' style='margin: 20px;text-align: center;'>
                                
//                 <small>© 2019 Dhera Sasto Deal., All Rights Reserved.<br>
//                   New Baneshwor, Kathmandu Nepal, NP +(977)<br>
//                   Thanks for having us.
//                 </small>
//                   <br>
//                 Visit Our Page <a href='http://localhost/Phpweb/protype/index.php'>Dherai Sasto Deal</a>
//               </div>
//             </div>
//     <script type='application/javascript' src='https://www.nayuki.io/res/qr-code-generator-library/qrcodegen.js'></script>
//         <script type='application/javascript' src='https://www.nayuki.io/res/qr-code-generator-library/qrcodegen-demo.js'></script>


// </body>

//          ";
         // $mail ->AltBody = "";
        //  $mail ->AddAddress($mailto);

         if(!$mail->Send())
         {
         
             echo '<style type="text/css">
          div.messages{
            background-color: #ff6b6b;
            color: #f7fff7;
            font-size: 20px;
          }
          ul.messages{
            list-style-type: none;
          }
        </style>

          <div class="messages">

          <ul class="messages">
            <li style="text-align: center;">Please Insert Valid Email!</li>
          </ul>

          </div>';
         }
         else
         {
            echo '<style type="text/css">
          div.messages{
            background-color: #ff6b6b;
            color: #f7fff7;
            font-size: 20px;
          }
          ul.messages{
            list-style-type: none;
          }
        </style>

          <div class="messages">

          <ul class="messages">
            <li style="text-align: center;">Please cleck your email</li>
          </ul>

          </div>';
         }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dherai Sasto deal Invoice</title>
</head>

<body>
<h1>Check Your Invoice With Scanner</h1>

<a href="user_map.php?c_id=<?php echo $_GET["tid"];?>" >Continue</a>
<form action="#" method="get" onsubmit="return false;">
  <table class="noborder" style="width:100%">
    <tbody>
      <tr>
        <td><strong>Text string:</strong></td>
        <td style="width:100%"><textarea placeholder="Enter your text to be put into the QR Code" id="text-input" style="width:100%; max-width:30em; height:5em; font-family:inherit" ><?php echo $invoice;?>
          
        </textarea></td>
      </tr>
      <tr>
        <td><strong>QR Code:</strong></td>
        <td>
          <canvas id="qrcode-canvas" style="padding:1em; background-color:#E8E8E8"></canvas>
          <svg id="qrcode-svg" style="width:30em; height:30em; padding:1em; background-color:#E8E8E8">
            <rect width="100%" height="100%" fill="#FFFFFF" stroke-width="0"></rect>
            <path d="" fill="#000000" stroke-width="0"></path>
          </svg>
        </td>
      </tr>
      <tr>
        <td><strong>Error correction:</strong></td>
        <td>
          <input type="radio" name="errcorlvl" id="errcorlvl-low" checked="checked"><label for="errcorlvl-low">Low</label>
          <input type="radio" name="errcorlvl" id="errcorlvl-medium"><label for="errcorlvl-medium">Medium</label>
          <input type="radio" name="errcorlvl" id="errcorlvl-quartile"><label for="errcorlvl-quartile">Quartile</label>
          <input type="radio" name="errcorlvl" id="errcorlvl-high"><label for="errcorlvl-high">High</label>
        </td>
      </tr>
      <tr>
        <td>Output format:</td>
        <td>
          <input type="radio" name="output-format" id="output-format-bitmap" checked="checked"><label for="output-format-bitmap">Bitmap</label>
          <input type="radio" name="output-format" id="output-format-vector"><label for="output-format-vector">Vector</label>
        </td>
      </tr>
      <tr>
        <td>Border:</td>
        <td><input type="number" value="4" min="0" max="100" step="1" id="border-input" style="width:4em"> modules</td>
      </tr>
      <tr id="scale-row">
        <td>Scale:</td>
        <td><input type="number" value="8" min="1" max="30" step="1" id="scale-input" style="width:4em"> pixels per module</td>
      </tr>
      <tr>
        <td>Version range:</td>
        <td>
          Minimum = <input type="number" value="1"  min="1" max="40" step="1" id="version-min-input" style="width:4em" oninput="app.handleVersionMinMax('min');">,
          maximum = <input type="number" value="40" min="1" max="40" step="1" id="version-max-input" style="width:4em" oninput="app.handleVersionMinMax('max');">
        </td>
      </tr>
      <tr>
        <td>Mask pattern:</td>
        <td><input type="number" value="-1" min="-1" max="7" step="1" id="mask-input" style="width:4em"> (−1 for automatic, 0 to 7 for manual)</td>
      </tr>
      <tr>
        <td>Boost ECC:</td>
        <td><input type="checkbox" checked="checked" id="boost-ecc-input"><label for="boost-ecc-input">Increase <abbr title="error-correcting code">ECC</abbr> level within same version</label></td>
      </tr>
      <tr>
        <td>Statistics:</td>
        <td id="statistics-output" style="white-space:pre"></td>
      </tr>
      <tr id="svg-xml-row">
        <td>SVG XML code:</td>
        <td>
          <textarea id="svg-xml-output" readonly="readonly" style="width:100%; max-width:50em; height:15em; font-family:monospace"></textarea>
        </td>
      </tr>
    </tbody>
  </table>
</form>
<script type="application/javascript" src="js/qrcodegen.js"></script>
<script type="application/javascript" src="js/qrcodegen-demo.js"></script>

<hr>

</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Thank You For Using Dherai Sasto Deal</title>
</head>
<body>
  <div class="container mt-4">
    <h2>Thank you for purchasing <?php echo $product; ?></h2>
    <hr>
    <p>Your transaction ID is <?php echo $tid; ?></p>
    <p>Check your email for more info</p>
    <p><a href="user_map.php?c_id=<?php echo $tid; ?>" class="btn btn-light mt-2">Add Location</a></p>
  </div>
</body>
</html> -->