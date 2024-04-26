<?php
include 'db_config.php'; // Include your database connection file

// Fetch orders from the database
$query = "SELECT o.id, m.name AS medicine_name, o.quantity, o.order_date, o.delivered_date
          FROM orders o
          INNER JOIN medicines m ON o.medicine_id = m.id
          ORDER BY o.order_date DESC";
$result = $pdo->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
</head>
<body>
    <h2>View Orders</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Medicine Name</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Delivered Date</th>
        </tr>
        <?php
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['medicine_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td>" . ($row['delivered_date'] ? $row['delivered_date'] : 'Not delivered') . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No orders found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
