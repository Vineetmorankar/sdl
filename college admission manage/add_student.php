<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO students (first_name, last_name, email, phone, address, date_of_birth, gender) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$date_of_birth', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        First Name: <input type="text" name="first_name" required><br><br>
        Last Name: <input type="text" name="last_name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        Date of Birth: <input type="date" name="date_of_birth" required><br><br>
        Gender:
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>
