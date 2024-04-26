<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_item'])) {
    $item_id = $_POST['item_id'];
    // Remove item from cart
    unset($_SESSION['cart'][$item_id]);
}

?>

<div class="cart-items">
    <?php foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
        <div class="cart-item">
            <span>Product ID: <?php echo $product_id; ?></span>
            <span>Quantity: <?php echo $quantity; ?></span>
            <form action="cart.php" method="post">
                <input type="hidden" name="item_id" value="<?php echo $product_id; ?>">
                <button type="submit" name="remove_item">Remove</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
