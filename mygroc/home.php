<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<div class="products">
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="product-card">
            <h3><?php echo $row['name']; ?></h3>
            <p>Price: $<?php echo $row['price']; ?></p>
            <!-- Add to cart form -->
            <form action="cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>
