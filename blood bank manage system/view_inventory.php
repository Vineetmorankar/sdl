<?php
include 'db_config.php';

$sql = "SELECT * FROM blood_inventory";
$stmt = $pdo->query($sql);
$inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Blood Inventory</title>
</head>
<body>
    <h2>Blood Inventory</h2>
    <table border="1">
        <tr>
            <th>Blood Group</th>
            <th>Quantity</th>
            <th>Expiry Date</th>
            <th>Added At</th>
        </tr>
        <?php foreach ($inventory as $item): ?>
            <tr>
                <td><?= $item['blood_group'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= $item['expiry_date'] ?></td>
                <td><?= $item['added_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
