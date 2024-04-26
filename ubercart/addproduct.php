<?php
include 'db_config.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Insert product into the products table
    $sql = "INSERT INTO products (name, description, price, image) 
            VALUES ('$name', '$description', '$price', '$image')";

    if ($pdo->exec($sql) !== false) {
        echo "Product added successfully!";
    } else {
        echo "Error adding product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add Product</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br><br>
        Description: <textarea name="description" rows="4" cols="50" required></textarea><br><br>
        Price: <input type="number" name="price" step="0.01" min="0" required><br><br>
        Image URL: <input type="text" name="image" required><br><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
