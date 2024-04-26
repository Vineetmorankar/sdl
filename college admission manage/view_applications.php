<?php
include('db.php');

$sql = "SELECT applications.application_id, students.first_name, students.last_name, courses.course_name, applications.status
        FROM applications
        INNER JOIN students ON applications.student_id = students.student_id
        INNER JOIN courses ON applications.course_id = courses.course_id";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
</head>
<body>
    <h2>Applications</h2>
    <table border="1">
        <tr>
            <th>Application ID</th>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['application_id'] . "</td>";
                echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                echo "<td>" . $row['course_name'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No applications found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
