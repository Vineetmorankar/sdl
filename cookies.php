<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Example with PHP</title>
</head>
<body>
    <h2>Cookie Example with PHP</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="cookieName">Cookie Name:</label><br>
        <input type="text" id="cookieName" name="cookieName"><br><br>
        
        <label for="cookieValue">Cookie Value:</label><br>
        <input type="text" id="cookieValue" name="cookieValue"><br><br>
        
        <button type="submit" name="submit">Set Cookie</button>
    </form>

    <div id="cookieDisplay">
        <?php
        // Function to display stored cookies
        function displayCookies() {
            if (isset($_COOKIE) && !empty($_COOKIE)) {
                echo "<h3>Stored Cookies:</h3>";
                foreach ($_COOKIE as $name => $value) {
                    echo "<p><strong>$name:</strong> $value</p>";
                }
            } else {
                echo "<p>No cookies set.</p>";
            }
        }

        // If form is submitted, set the cookie
        if (isset($_POST['submit'])) {
            $cookieName = $_POST['cookieName'];
            $cookieValue = $_POST['cookieValue'];
            // Set cookie with expiration in 1 day
            setcookie($cookieName, $cookieValue, time() + (86400), "/");
            echo "<script>alert('Cookie has been set!');</script>";
        }

        // Display stored cookies
        displayCookies();
        ?>
    </div>
</body>
</html>
