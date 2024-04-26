<?php
session_start();

include 'db_config.php';

// Fetch products from the database
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce Home</title>
</head>
<body>
    <h2>Welcome to E-Commerce</h2>
    <h3>Products</h3>
    <ul>
        <?php foreach ($products as $product) { ?>
            <li>
                <strong><?php echo $product['name']; ?></strong>
                <br>
                Description: <?php echo $product['description']; ?><br>
                Price: <?php echo $product['price']; ?>
                <form method="post" action="add_to_cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    Quantity: <input type="number" name="quantity" value="1" min="1" required>
                    <input type="submit" value="Add to Cart">
                </form>
            </li>
        <?php } ?>
    </ul>
    <p><a href="cart.php">View Cart</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
