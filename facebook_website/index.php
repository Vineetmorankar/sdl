<?php
include 'config.php';

// Fetch posts from database
$query = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Home</title>
</head>
<body>
    <h1>Welcome to Facebook Clone</h1>
    <h2>Recent Posts</h2>
    <form method="post" action="post.php">
        <textarea name="content" rows="4" cols="50" placeholder="What's on your mind?"></textarea><br><br>
        <input type="submit" value="Post">
    </form>
    <hr>
    <div>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>" . $row["user_id"] . "</strong>: " . $row["content"] . " - " . $row["created_at"] . "</p>";
            }
        } else {
            echo "No posts yet";
        }
        ?>
    </div>
</body>
</html>
