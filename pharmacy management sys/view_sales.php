<?php
include 'db_config.php';

$sql = "SELECT sales.id, medicines.name AS medicine_name, sales.quantity, sales.total_price, sales.sold_at
        FROM sales
        JOIN medicines ON sales.medicine_id = medicines.id";
$stmt = $pdo->query($sql);
$sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Sales</title>
</head>
<body>
    <h2>Sales</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Sold At</th>
        </tr>
        <?php foreach ($sales as $sale): ?>
            <tr>
                <td><?= $sale['id'] ?></td>
                <td><?= $sale['medicine_name'] ?></td>
                <td><?= $sale['quantity'] ?></td>
                <td><?= $sale['total_price'] ?></td>
                <td><?= $sale['sold_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
