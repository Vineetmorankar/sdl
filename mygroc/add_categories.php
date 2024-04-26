<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: add_categories.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="add_categories.php" method="post">
    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Add Category</button>
</form>
