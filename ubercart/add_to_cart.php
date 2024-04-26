<?php
session_start();

include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if item already exists in cart
    $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $existing_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing_item) {
        // If item exists, update quantity
        $new_quantity = $existing_item['quantity'] + $quantity;
        $updateStmt = $pdo->prepare("UPDATE cart SET quantity = :quantity WHERE id = :cart_id");
        $updateStmt->bindParam(':quantity', $new_quantity);
        $updateStmt->bindParam(':cart_id', $existing_item['id']);
        $updateStmt->execute();
    } else {
        // If item doesn't exist, add to cart
        $insertStmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $insertStmt->bindParam(':user_id', $user_id);
        $insertStmt->bindParam(':product_id', $product_id);
        $insertStmt->bindParam(':quantity', $quantity);
        $insertStmt->execute();
    }

    // Redirect to cart after adding to cart
    header("Location: cart.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
