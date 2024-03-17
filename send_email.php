<?php
// Your PHP code here

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoloader

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];
    $subject = "Message from HTML Form";
    $message = $_POST['message'];

    // PHPMailer configuration
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com'; // Replace with your Gmail address
    $mail->Password = 'your_password'; // Replace with your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    try {
        // Email sending
        $mail->setFrom('your_email@gmail.com', 'Your Name');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send email. Please try again later. Error: {$mail->ErrorInfo}";
    }
}
?>
