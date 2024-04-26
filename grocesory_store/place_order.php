<?php
include('db.php');

// Fetch products for dropdown
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Place Order</title>
</head>
<body>
    <h2>Place New Order</h2>
    <form method="post" action="place_order_process.php">
        Product:
        <select name="product_id" required>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['product_id'] . "'>" . $row['product_name'] . " - $" . $row['price'] . "</option>";
                }
            } else {
                echo "<option value=''>No products found</option>";
            }
            ?>
        </select><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        <input type="submit" value="Place Order">
    </form>
</body>
</html>
