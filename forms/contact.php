<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // adjust path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email   = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!$email) {
        http_response_code(400);
        echo 'Invalid email address.';
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP setup
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ronaldokipkirui90@gmail.com'; // your Gmail
        $mail->Password   = 'your-app-password-here';      // App password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('ronaldokipkirui90@gmail.com'); // your destination

        $mail->Subject = $subject;
        $mail->Body    = "From: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        http_response_code(500);
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
