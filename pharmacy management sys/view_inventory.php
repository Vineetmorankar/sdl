<?php
include 'db_config.php';

$sql = "SELECT * FROM medicines";
$stmt = $pdo->query($sql);
$medicines = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Inventory</title>
</head>
<body>
    <h2>Medicine Inventory</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Supplier ID</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($medicines as $medicine): ?>
            <tr>
                <td><?= $medicine['id'] ?></td>
                <td><?= $medicine['name'] ?></td>
                <td><?= $medicine['category'] ?></td>
                <td><?= $medicine['quantity'] ?></td>
                <td><?= $medicine['unit_price'] ?></td>
                <td><?= $medicine['supplier_id'] ?></td>
                <td><?= $medicine['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
