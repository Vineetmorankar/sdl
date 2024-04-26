<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle registration form submission
    // Validate input, insert into database, set session, etc.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
