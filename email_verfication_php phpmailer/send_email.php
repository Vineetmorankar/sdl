<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    // Get the submitted email
    $email = $_POST["email"];

    // Generate a unique verification code
    $verificationCode = md5(uniqid(rand(), true));

    // Email subject and message
    $subject = "Email Verification";
    $message = "Thank you for registering. Please click the link below to verify your email:\n\n";
    $message .= "http://yourwebsite.com/verify.php?code=" . $verificationCode;

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'localhost'; // Assuming XAMPP's SMTP server is running on localhost
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false;
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('dhanrajkalkutaki@gmail.com', 'Dhanraj Kalkutaki'); // Update with your email and name
        $mail->addAddress($email);

        // Email content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();
        echo "Verification email has been sent to $email";
    } catch (Exception $e) {
        echo "Failed to send verification email. Error: " . $mail->ErrorInfo;
    }
} else {
    // Redirect back to the form if accessed directly or no email provided
    header("Location: index.php");
    exit();
}
?>
