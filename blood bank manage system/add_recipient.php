<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO recipients (name, blood_group, phone, email, address) VALUES (:name, :blood_group, :phone, :email, :address)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':blood_group', $blood_group);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);

    $stmt->execute();

    header("Location: vrec.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Recipient</title>
</head>
<body>
    <h2>Add Recipient</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" required><br><br>
        Blood Group: <input type="text" name="blood_group" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        Email: <input type="email" name="email"><br><br>
        Address: <textarea name="address" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
