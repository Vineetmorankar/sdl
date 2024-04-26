<?php
include 'db_config.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['medicine_id']) && isset($_POST['quantity'])) {
    $medicine_id = $_POST['medicine_id'];
    $quantity = $_POST['quantity'];
    $order_date = date('Y-m-d'); // Assuming order date is today's date

    // Insert the order into the orders table
    $sql = "INSERT INTO orders (medicine_id, quantity, order_date) VALUES ('$medicine_id', '$quantity', '$order_date')";

    if ($pdo->query($sql)) {
        echo "Order placed successfully!";
    } else {
        echo "Error placing order.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Place Order</title>
</head>
<body>
    <h2>Place Order</h2>
    <form method="post" action="">
        Medicine ID: <input type="number" name="medicine_id" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        <input type="submit" value="Place Order">
    </form>
</body>
</html>
