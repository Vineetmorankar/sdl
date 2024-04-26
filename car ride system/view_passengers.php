<?php
include 'db_config.php';

$sql = "SELECT * FROM passengers";
$stmt = $pdo->query($sql);
$passengers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Passengers</title>
</head>
<body>
    <h2>Passengers</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($passengers as $passenger): ?>
            <tr>
                <td><?= $passenger['id'] ?></td>
                <td><?= $passenger['name'] ?></td>
                <td><?= $passenger['phone'] ?></td>
                <td><?= $passenger['email'] ?></td>
                <td><?= $passenger['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
