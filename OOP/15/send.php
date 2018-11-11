<?php
session_start();
require_once "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {           
    $mail->isSMTP();
    $mail->Host = 'smtp.mailgun.org';  
    $mail->SMTPAuth = true;
    $mail->Username = 'postmaster@sandbox05425e3822584831ac570749fe85b21a.mailgun.org';
    $mail->Password = '8a2461bcaed8b462fd6b2771fc050a55-97923b2d-e58f94d7';
    $mail->Port = 587;
} catch (Exception $e) {
    echo 'Neveikia mailgun<br>', $mail->ErrorInfo;
}

$sender = $_POST['sender'];
$subject = $_POST['subject'];
$addresses = $_POST['address'];
$text = $_POST['text'];

if(isset($_POST['send'])){
    $str = $_POST['text'];
    $mail->Body = $_POST['text'];
    $mail->Subject = $_POST['subject'];
    $mail->addAddress($_POST['address']);
    $mail->setFrom($_POST['sender']); 
    $mail->addReplyTo('noreply@noreply.re', 'No reply');
    $mail->isHTML(true);

    $recipients = explode(',', $addresses);
    foreach ($addresses as $address) {
        $mail->AddCC($address);
    }

    $mail->send($str);

    $_SESSION['message'] = "Laiškas išsiųstas.";
    header('Location: index.php');
}
