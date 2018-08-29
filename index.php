<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;';                      // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'enderimen13.ei@gmail.com';         // SMTP username
    $mail->Password = '';                                 // SMTP password
    $mail->SMTPSecure = '';                               // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';                             // Convert to UTF-8

    //Recipients
    $mail->setFrom('enderimen13.ei@gmail.com', 'ACER E1-571-G / PC');
    $mail->addAddress('enderimen@hotmail.com', 'Ender İMEN');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'PC | Oturum Açıldı!';
    $mail->Body    = 'Ender İMEN, birkaç dakika önce bilgisayarınızda oturum açıldı! Bu siz misiniz?';

    $mail->send();
    echo 'E-posta gönderildi!';
} catch (Exception $e) {
    echo 'E-posta gönderilirken hata oluştu! Hata Detayı: ', $mail->ErrorInfo;
}