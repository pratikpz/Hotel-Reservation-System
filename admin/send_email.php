<?php
require __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer-master/src/SMTP.php';
require __DIR__ . '/../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

// Function to send an email
function sendEmail($to, $subject, $message)
{
    $mail = new PHPMailer();

    // Configure SMTP settings (if using SMTP)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'prpa_bca2077@lict.edu.np'; // Your Gmail email address
    $mail->Password = 'pagalma22';  // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set email content type
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    // Set the 'From' address (the sender's email)
    $mail->setFrom('prpa_bca2077@lict.edu.np', 'Pratik');

    // Add the recipient's email address
    $mail->addAddress($to);

    // Set email subject and body
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if ($mail->send()) {
        return true; // Email sent successfully
    } else {
        return false; // Failed to send email
    }
}
?>