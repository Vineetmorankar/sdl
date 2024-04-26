<?php
include('db.php');

// Fetch categories for dropdown
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="post" action="adprocess.php">
        Product Name: <input type="text" name="product_name" required><br><br>
        Category:
        <select name="category_id" required>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                }
            } else {
                echo "<option value=''>No categories found</option>";
            }
            ?>
        </select><br><br>
        Price: <input type="text" name="price" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
