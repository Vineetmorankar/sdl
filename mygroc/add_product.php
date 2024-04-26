<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO products (name, price, category_id) VALUES ('$name', '$price', '$category_id')";
    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="add_product.php" method="post">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>
    
    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id" required>
        <!-- Fetch and display categories from database -->
        <?php
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        ?>
    </select>
    
    <button type="submit">Add Product</button>
</form>
