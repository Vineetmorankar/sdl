<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Get product details
    $product_sql = "SELECT * FROM products WHERE product_id = '$product_id'";
    $product_result = $conn->query($product_sql);

    if ($product_result->num_rows > 0) {
        $row = $product_result->fetch_assoc();
        $price = $row['price'];
        $total_price = $price * $quantity;

        // Update product quantity
        $update_sql = "UPDATE products SET quantity = quantity - $quantity WHERE product_id = $product_id";

        if ($conn->query($update_sql) === TRUE) {
            // Insert into orders
            $order_sql = "INSERT INTO orders (product_id, quantity, total_price) 
                          VALUES ('$product_id', '$quantity', '$total_price')";

            if ($conn->query($order_sql) === TRUE) {
                echo "Order placed successfully";
            } else {
                echo "Error: " . $order_sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error updating product quantity: " . $conn->error;
        }
    } else {
        echo "Product not found";
    }
}
?>
