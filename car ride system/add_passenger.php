<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO passengers (name, phone, email) VALUES ('$name', '$phone', '$email')";
    
    // Execute the SQL statement
    $pdo->query($sql);

    header("Location: view_passengers.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Passenger</title>
</head>
<body>
    <h2>Add Passenger</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        Email: <input type="email" name="email"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
