<?php
include 'config.php';

// Fetch messages from database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Messages</title>
</head>
<body>
    <h1>Messages</h1>
    <h2>Inbox</h2>
    <ul>
        <!-- Display received messages -->
    </ul>
    <h2>Send Message</h2>
    <form method="post" action="send_message.php">
        <label for="receiver">Receiver:</label><br>
        <input type="text" id="receiver" name="receiver" required><br><br>
        <label for="message">Message:</label><br>
        <textarea name="message" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
