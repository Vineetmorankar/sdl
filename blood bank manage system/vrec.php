<?php
include 'db_config.php';

$sql = "SELECT * FROM recipients";
$stmt = $pdo->query($sql);
$recipients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Recipients</title>
</head>
<body>
    <h2>Recipients</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($recipients as $recipient): ?>
            <tr>
                <td><?= $recipient['name'] ?></td>
                <td><?= $recipient['blood_group'] ?></td>
                <td><?= $recipient['phone'] ?></td>
                <td><?= $recipient['email'] ?></td>
                <td><?= $recipient['address'] ?></td>
                <td><?= $recipient['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
