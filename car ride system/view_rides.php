<?php
include 'db_config.php';

$sql = "SELECT rides.id, cars.brand, cars.model, drivers.name AS driver_name, passengers.name AS passenger_name, 
        rides.ride_date, rides.pickup_location, rides.dropoff_location, rides.fare, rides.created_at
        FROM rides
        JOIN cars ON rides.car_id = cars.id
        JOIN drivers ON rides.driver_id = drivers.id
        JOIN passengers ON rides.passenger_id = passengers.id";
$stmt = $pdo->query($sql);
$rides = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Rides</title>
</head>
<body>
    <h2>Rides</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Car</th>
            <th>Driver</th>
            <th>Passenger</th>
            <th>Ride Date</th>
            <th>Pickup Location</th>
            <th>Dropoff Location</th>
            <th>Fare</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($rides as $ride): ?>
            <tr>
                <td><?= $ride['id'] ?></td>
                <td><?= $ride['brand'] ?> <?= $ride['model'] ?></td>
                <td><?= $ride['driver_name'] ?></td>
                <td><?= $ride['passenger_name'] ?></td>
                <td><?= $ride['ride_date'] ?></td>
                <td><?= $ride['pickup_location'] ?></td>
                <td><?= $ride['dropoff_location'] ?></td>
                <td><?= $ride['fare'] ?></td>
                <td><?= $ride['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
