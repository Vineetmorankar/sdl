<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories (category_name) 
            VALUES ('$category_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New category added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h2>Add New Category</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Category Name: <input type="text" name="category_name" required><br><br>
        <input type="submit" value="Add Category">
    </form>
</body>
</html>
