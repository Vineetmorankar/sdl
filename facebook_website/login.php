<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login form submission
    // Validate input, check credentials from database, set session, etc.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
