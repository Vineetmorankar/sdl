<?php
include 'db_config.php';

$sql = "SELECT * FROM cars";
$stmt = $pdo->query($sql);
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Cars</title>
</head>
<body>
    <h2>Cars</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Registration Number</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($cars as $car): ?>
            <tr>
                <td><?= $car['id'] ?></td>
                <td><?= $car['brand'] ?></td>
                <td><?= $car['model'] ?></td>
                <td><?= $car['year'] ?></td>
                <td><?= $car['registration_number'] ?></td>
                <td><?= $car['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
