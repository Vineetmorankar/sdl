<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO suppliers (name, phone, email, address) 
            VALUES (:name, :phone, :email, :address)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);

    $stmt->execute();

    header("Location: view_suppliers.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Supplier</title>
</head>
<body>
    <h2>Add Supplier</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        Email: <input type="email" name="email"><br><br>
        Address: <textarea name="address" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
