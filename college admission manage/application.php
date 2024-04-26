<?php
// Database connection
include('db.php');
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $course_id = $_POST['course_id'];

    // Insert into applications table
    $sql = "INSERT INTO applications (student_id, course_id) VALUES (1, $course_id)"; // Assuming student_id is 1
    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
</head>

<body>
    <h1>Application Form</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br>

        <label for="last_name">Last Name:</label>
<input type="text" id="last_name" name="last_name"><br>

<label for="email">Email:</label>
<input type="email" id="email" name="email"><br>

<label for="phone">Phone:</label>
<input type="tel" id="phone" name="phone"><br>

<label for="address">Address:</label>
<input type="text" id="address" name="address"><br>

<label for="dob">Date of Birth:</label>
<input type="date" id="dob" name="dob"><br>

<label for="gender">Gender:</label>
<select id="gender" name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
</select><br>

        
        <label for="course_id">Select Course:</label>
        <select id="course_id" name="course_id">
            <?php
            $sql = "SELECT course_id, course_name FROM courses";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
                }
            }
            ?>
        </select><br>

        <input type="submit" value="Apply">
    </form>
</body>

</html>

<?php
// Close database connection
$conn->close();
?>
