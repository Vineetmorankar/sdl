<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content'])) {
    $content = $_POST['content'];
    // Assuming you have a session or user ID to associate with the post
 // Replace with the actual user ID from your session or authentication system

    // Insert the post into the database
    $sql = "INSERT INTO posts (content) VALUES ('$content')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to the homepage after posting
        exit();
    } else {
        echo "Error posting content: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
