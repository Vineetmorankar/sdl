<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            margin: 20px auto;
            padding: 20px;
            max-width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php

$employee_names = array(
    "Aarav",
    "Aaradhya",
    "Aaditya",
    "Advika",
    "Aryan",
    "Amaira",
    "Bhuvan",
    "Chahna",
    "Dhruv",
    "Diya",
    "Eshaan",
    "Eva",
    "Faizan",
    "Fiza",
    "Gaurav",
    "Gayatri",
    "Harsh",
    "Ishita",
    "Jay",
    "Jiya"
);

if (isset($_GET['search_name'])) {
    $search_name = $_GET['search_name'];
    $result = in_array($search_name, $employee_names);

    if ($result) {
        echo "<p>{$search_name} is an employee.</p>";
    } else {
        echo "<p>{$search_name} is not found in the list of employees.</p>";
    }
}
?>

<form method="GET" action="">
    <label for="search_name">Enter employee name:</label>
    <input type="text" name="search_name" id="search_name" required>
    <button type="submit">Search</button>
</form>

</body>
</html>
