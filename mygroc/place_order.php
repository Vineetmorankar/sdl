<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $total_price = $_POST['total_price'];

    $sql = "INSERT INTO orders (user_id, total_price) VALUES ('$user_id', '$total_price')";
    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id;
        // Assuming $_SESSION['cart'] contains product IDs and quantities
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
            $conn->query($sql);
        }
        unset($_SESSION['cart']);  // Clear cart after placing order
        header("Location: home.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="place_order.php" method="post">
    <label for="total_price">Total Price:</label>
    <input type="text" name="total_price" id="total_price" required>
    <button type="submit">Place Order</button>
</form>
