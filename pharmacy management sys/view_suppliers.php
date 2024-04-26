<?php
include 'db_config.php';

$sql = "SELECT * FROM suppliers";
$stmt = $pdo->query($sql);
$suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Suppliers</title>
</head>
<body>
    <h2>Suppliers</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($suppliers as $supplier): ?>
            <tr>
                <td><?= $supplier['id'] ?></td>
                <td><?= $supplier['name'] ?></td>
                <td><?= $supplier['phone'] ?></td>
                <td><?= $supplier['email'] ?></td>
                <td><?= $supplier['address'] ?></td>
                <td><?= $supplier['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
