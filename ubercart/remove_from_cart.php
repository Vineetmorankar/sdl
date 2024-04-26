<?php
session_start();

include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cart_id = $_POST['cart_id'];

    // Delete item from cart based on cart_id
    $deleteQuery = "DELETE FROM cart WHERE id = $cart_id";
    $pdo->query($deleteQuery);

    // Redirect back to cart after removal
    header("Location: cart.php");
    exit();
}
?>
