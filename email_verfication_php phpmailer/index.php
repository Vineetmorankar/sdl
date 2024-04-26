<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>
<body>
    <h2>Email Verification</h2>
    <form action="send_email.php" method="post">
        <label for="email">Enter your email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Send Verification Email">
    </form>
</body>
</html>
