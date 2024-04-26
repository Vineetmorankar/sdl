<?php
session_start();

include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    // Get user ID from session
    $user_id = $_SESSION['user_id'];

    // Fetch cart items for the user
    $cartQuery = "SELECT * FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = $user_id";
    $cartResult = $pdo->query($cartQuery);
    $cart_items = $cartResult->fetchAll(PDO::FETCH_ASSOC);

    // Calculate total cost of the order
    $total = 0;
    foreach ($cart_items as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Insert order record
    $orderQuery = "INSERT INTO orders (user_id, total) VALUES ($user_id, $total)";
    $pdo->query($orderQuery);

    // Get the last inserted order ID
    $order_id = $pdo->lastInsertId();

    // Insert order details (items)
    foreach ($cart_items as $item) {
        $insertDetailQuery = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES ($order_id, {$item['product_id']}, {$item['quantity']}, {$item['price']})";
        $pdo->query($insertDetailQuery);
    }

    // Clear the cart after checkout
    $clearCartQuery = "DELETE FROM cart WHERE user_id = $user_id";
    $pdo->query($clearCartQuery);

    // Redirect to thank you page
    header("Location: thank_you.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h2>Checkout</h2>
    <form method="post" action="">
        <!-- Add fields for shipping and payment information -->
        <input type="submit" name="checkout" value="Checkout">
    </form>
    <p><a href="index.php">Back to Shopping</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
