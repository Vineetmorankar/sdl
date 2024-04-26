<?php
include 'db_config.php';

$sql = "SELECT * FROM drivers";
$stmt = $pdo->query($sql);
$drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Drivers</title>
</head>
<body>
    <h2>Drivers</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($drivers as $driver): ?>
            <tr>
                <td><?= $driver['id'] ?></td>
                <td><?= $driver['name'] ?></td>
                <td><?= $driver['phone'] ?></td>
                <td><?= $driver['email'] ?></td>
                <td><?= $driver['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
