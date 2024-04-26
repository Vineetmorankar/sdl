<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Generate a verification code
    $verification_code = mt_rand(100000, 999999);

    // Send the verification code to the email address
    $subject = "Email Verification Code";
    $message = "Your verification code is: $verification_code";
    $headers = "From: your@example.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "Verification code sent to $email";
    } else {
        echo "Failed to send verification code. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h2>Email Verification</h2>
    <form method="post">
        <label for="email">Enter your email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Send Verification Code">
    </form>
</body>
</html>
