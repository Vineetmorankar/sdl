<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO courses (course_name, description) 
            VALUES ('$course_name', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New course added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>
<body>
    <h2>Add New Course</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Course Name: <input type="text" name="course_name" required><br><br>
        Description: <textarea name="description" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Add Course">
    </form>
</body>
</html>
