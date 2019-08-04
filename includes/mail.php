<?php
if(isset($_POST['mail'])){

    $mailto = "dheraisastodeal@gmail.com";
    $mailSub = "Feadback";
    $mailMsg = strip_tags($_POST['editor1']);
   require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";//smtp.gmail.com
   $mail ->Port = 465; // or  465
   $mail ->IsHTML(true);
   $mail ->Username = "sandesht801@gmail.com"; //Source email address
   $mail ->Password = "";
   $mail ->SetFrom("sandesht801@gmail.com");
   $mail ->addAttachment('walpaper/concert.jpg');
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   // $mail ->AltBody = "";
   $mail ->AddAddress($mailto);

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
      <li style="text-align: center;">Feadback is not sended!</li>
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
      <li style="text-align: center;">Successfully, Sended!</li>
    </ul>

    </div>';
   }


}
?>

   

