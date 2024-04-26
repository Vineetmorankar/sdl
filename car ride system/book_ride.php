<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'];
    $driver_id = $_POST['driver_id'];
    $passenger_id = $_POST['passenger_id'];
    $ride_date = $_POST['ride_date'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $fare = $_POST['fare'];

    $sql = "INSERT INTO rides (car_id, driver_id, passenger_id, ride_date, pickup_location, dropoff_location, fare) 
            VALUES ('$car_id', '$driver_id', '$passenger_id', '$ride_date', '$pickup_location', '$dropoff_location', '$fare')";

    // Execute the SQL statement
    $pdo->query($sql);

    header("Location: view_rides.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Ride</title>
</head>
<body>
    <h2>Book Ride</h2>
    <form method="post" action="">
        Car ID: <input type="number" name="car_id" required><br><br>
        Driver ID: <input type="number" name="driver_id" required><br><br>
        Passenger ID: <input type="number" name="passenger_id" required><br><br>
        Ride Date: <input type="date" name="ride_date" required><br><br>
        Pickup Location: <input type="text" name="pickup_location" required><br><br>
        Dropoff Location: <input type="text" name="dropoff_location" required><br><br>
        Fare: <input type="number" name="fare" step="0.01" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
