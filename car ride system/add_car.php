<?php
// Include the database connection file
include 'db_config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $registration_number = $_POST['registration_number'];

    // Create the SQL query to insert data into the 'cars' table
    $sql = "INSERT INTO cars (brand, model, year, registration_number) 
            VALUES ('$brand', '$model', '$year', '$registration_number')";

    // Execute the SQL query
    if ($pdo->query($sql)) {
        echo "Car added successfully!";
        header("Location: index.php"); // Redirect to index.php after successful addition
        exit(); // Exit the script
    } else {
        echo "Error adding car.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
</head>
<body>
    <h2>Add Car</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required><br><br>

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required><br><br>

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" min="1900" max="2099" required><br><br>

        <label for="registration_number">Registration Number:</label>
        <input type="text" id="registration_number" name="registration_number" required><br><br>

        <input type="submit" value="Add Car">
    </form>
</body>
</html>
