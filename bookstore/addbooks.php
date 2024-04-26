<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$pdo = new mysqli($host, $username, $password, $dbname);

if ($pdo->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    // Insert book into the database using query
    $insertQuery = "INSERT INTO books (title, author, category, price) VALUES ('$title', '$author', '$category', '$price')";
    $pdo->query($insertQuery);

    // Redirect to a page after adding the book
    header("Location: fetch_books.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>Add Book</h2>
    <form method="post" action="">
        Title: <input type="text" name="title" required><br><br>
        Author: <input type="text" name="author" required><br><br>
        Category: <input type="text" name="category"><br><br>
        Price: <input type="number" name="price" step="0.01" required><br><br>
        <input type="submit" value="Add Book">
    </form>
</body>
</html>
