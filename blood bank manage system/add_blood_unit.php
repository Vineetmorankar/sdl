<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood_group = $_POST['blood_group'];
    $quantity = $_POST['quantity'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "INSERT INTO blood_inventory (blood_group, quantity, expiry_date) VALUES (:blood_group, :quantity, :expiry_date)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':blood_group', $blood_group);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':expiry_date', $expiry_date);

    $stmt->execute();

    header("Location: view_inventory.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blood Unit</title>
</head>
<body>
    <h2>Add Blood Unit</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Blood Group: <input type="text" name="blood_group" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        Expiry Date: <input type="date" name="expiry_date" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
