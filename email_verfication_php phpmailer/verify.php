<?php
// Check if the verification code is in the URL
if (isset($_GET["code"])) {
    $verificationCode = $_GET["code"];

    // In a real-world scenario, you would check the database for the verification code
    // For the sake of this example, let's assume the code matches
    // You would typically have a table with columns like email, verification_code, is_verified

    // Connect to your database (Assuming you are using MySQLi)
    $mysqli = new mysqli("localhost", "username", "password", "database_name");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare a SQL query to check if the verification code exists
    $stmt = $mysqli->prepare("SELECT email FROM users WHERE verification_code = ?");
    $stmt->bind_param("s", $verificationCode);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // If the verification code exists, update the user as verified
        $stmt->bind_result($email);
        $stmt->fetch();

        // Update the user as verified (Assuming you have a column 'is_verified')
        $updateStmt = $mysqli->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
        $updateStmt->bind_param("s", $email);
        $updateStmt->execute();

        echo "Email ($email) has been successfully verified!";
    } else {
        echo "Invalid verification code or email not found.";
    }

    // Close statements and the database connection
    $stmt->close();
    $updateStmt->close();
    $mysqli->close();
} else {
    echo "Invalid verification code.";
}
?>
