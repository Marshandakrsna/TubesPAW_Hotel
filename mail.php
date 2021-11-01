<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;

$mail->Username = 'syalibahotel@gmail.com';
$mail->Password = 'syaliba123';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('Emailpengirim@gmail.com', 'Syaliba Hotel');
$mail->addAddress($_POST['email'], $_POST['nama']);
$mail->isHTML(true);
$mail->Subject = "Aktivasi Pendaftaran Member Syaliba Hotel";
$mail->Body = "<h2>Hello, " .$nama. "! Welcome to Syaliba Hotel! Happy Staycation!</h2><br> Please verify your email first to access our awesome view! Enjoy! Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
 <a href='http://localhost/PAWSyaliba/activation.php?t=" . $token . "'>http://localhost/PAWSyaliba/activation.php?t=" . $token . "</a>  ";
$mail->send();
echo "<script>alert('Pendaftaran Berhasil, Silahkan Cek Email dan Lakukan Aktivasi')</script>";
echo "<script>location='login.php';</script>";
