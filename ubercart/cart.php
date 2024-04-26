<?php
session_start();

include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items for the logged-in user
$stmt = $pdo->prepare("SELECT cart.id, products.name, products.price, cart.quantity FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h2>Shopping Cart</h2>
    <ul>
        <?php foreach ($cart_items as $item) { ?>
            <li>
                <strong><?php echo $item['name']; ?></strong>
                <br>
                Price: <?php echo $item['price']; ?>
                <br>
                Quantity: <?php echo $item['quantity']; ?>
                <form method="post" action="remove_from_cart.php">
                    <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                    <input type="submit" value="Remove">
                </form>
            </li>
        <?php } ?>
    </ul>
    <p><a href="index.php">Continue Shopping</a></p>
    <p><a href="checkout.php">Checkout</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
