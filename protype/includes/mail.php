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
   $mail ->SMTPSecure = 'tls';
   $mail ->Host = "smtp.sendgrid.net";//smtp.gmail.com
   $mail ->Port = 587; // or  465
   $mail ->IsHTML(true);
   $mail ->Username = "sandesht801@gmail.com"; //Source email address
   $mail ->Password = "password";
   $mail ->SetFrom("sandesht801@gmail.com");
   //$mail ->addAttachment('/image/');
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AltBody = "";
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo '<script>
        alert("Feadback Not Send")
       </script>';
   }
   else
   {
       echo '<script>
        alert("Feadback Send")
       </script>';
   }


}
?>

   

