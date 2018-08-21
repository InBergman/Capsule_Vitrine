<?php
function debug($value) {
  echo '<pre style="font-size : 15px;">' . print_r($value, true) . '</pre>';
}

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function str_random($length) {
  $alpha = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
  return (substr(str_shuffle(str_repeat($alpha, $length)), 0, $length));
}

function logged_only()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['auth'])) {
    $_SESSION['flash']['error'] = "Vous n'avez pas le droit d'acceder a cette page";
    echo "<script type='text/javascript'>window.location.href = 'user_artiste.php';</script>";
    exit();
  }
}

function send_mail($email, $subject, $body) {

    $mail 				= new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $message 			= $subject;
    $mail->isSMTP();
    $mail->SMTPAuth 	= true;
    $mail->SMTPSecure 	= 'ssl';
    $mail->SMTPKeepAlive = true;
    // $mail->Port 		= '587';
    $mail->Mailer = "smtp";
    $mail->Host 		= 'ssl://mail.gandi.net:465';
    $mail->Username 	= 'capsule@bonjour-capsule.fr';
    $mail->Password 	= 'Capsule666@';
    $mail->isHTML(true);
    $mail->SetFrom('capsule@bonjour-capsule.fr');
    $mail->addReplyTo($email);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body    		= $body;
    $mail->AltBody 		= 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    // if(!$mail->send()) {
    //     echo 'Message could not be sent.';
    //     echo 'Mailer Error: ' . $mail->ErrorInfo;
    // } else {
    //     echo 'Message has been sent';
    // }
  }

function send_mail_mamp($email, $subject, $body) {

  $mail 				= new PHPMailer();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $message 			= $subject;
  $mail->isSMTP();
  $mail->SMTPAuth 	= true;
  $mail->SMTPSecure 	= 'tls';
  $mail->SMTPKeepAlive = true;
  $mail->Port 		= '587';
  $mail->Mailer = "smtp";
  $mail->Host 		= 'smtp.gmail.com';
  $mail->Username 	= 'cocteautings@gmail.com';
  // $mail->Password 	= 'Capsule666@';
  $mail->Password 	= '!Vincentsuce123';
  $mail->isHTML(true);
  $mail->SetFrom('cocteautings@gmail.com');
  $mail->addReplyTo($email);
  $mail->addAddress($email);
  $mail->Subject = $subject;
  $mail->Body    		= $body;
  $mail->AltBody 		= 'This is the body in plain text for non-HTML mail clients';
  $mail->send();
  // if(!$mail->send()) {
  //     echo 'Message could not be sent.';
  //     echo 'Mailer Error: ' . $mail->ErrorInfo;
  // } else {
  //     echo 'Message has been sent';
  // }
}
