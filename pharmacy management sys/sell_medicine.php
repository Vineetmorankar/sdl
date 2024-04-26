<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_id = $_POST['medicine_id'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    // Check if there is enough quantity in the inventory
    $check_sql = "SELECT quantity FROM medicines WHERE id = :medicine_id";
    $check_stmt = $pdo->prepare($check_sql);
    $check_stmt->bindParam(':medicine_id', $medicine_id);
    $check_stmt->execute();
    $available_quantity = $check_stmt->fetchColumn();

    if ($available_quantity < $quantity) {
        echo "Not enough quantity in inventory.";
    } else {
        // Update inventory
        $update_sql = "UPDATE medicines SET quantity = quantity - :quantity WHERE id = :medicine_id";
        $update_stmt = $pdo->prepare($update_sql);
        $update_stmt->bindParam(':quantity', $quantity);
        $update_stmt->bindParam(':medicine_id', $medicine_id);
        $update_stmt->execute();

        // Record sale
        $sql = "INSERT INTO sales (medicine_id, quantity, total_price) 
                VALUES (:medicine_id, :quantity, :total_price)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':medicine_id', $medicine_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->execute();

        header("Location: view_sales.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sell Medicine</title>
</head>
<body>
    <h2>Sell Medicine</h2>
    <form method="post" action="">
        Medicine ID: <input type="number" name="medicine_id" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        Total Price: <input type="number" name="total_price" step="0.01" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
