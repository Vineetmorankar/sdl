<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch books from database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Display books
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books Catalogue</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Books Catalogue</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>$" . $row["price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No books found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
