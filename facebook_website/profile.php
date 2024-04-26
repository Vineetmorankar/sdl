<?php
include 'config.php';

// Fetch user profile details from database
$query = "SELECT * FROM users WHERE id = ?"; // Use prepared statements
// Execute the query and fetch user data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <div>
        <img src="profile_pics/<?php echo $profile_pic; ?>" alt="Profile Picture" width="150"><br><br>
        <strong>Username:</strong> <?php echo $username; ?><br>
        <strong>Email:</strong> <?php echo $email; ?><br>
        <strong>Full Name:</strong> <?php echo $fullname; ?><br><br>
        <!-- Display additional profile information -->
    </div>
</body>
</html>
