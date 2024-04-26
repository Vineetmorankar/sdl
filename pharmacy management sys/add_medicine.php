<?php
include 'db_config.php';

// Define variables to hold error messages
$nameErr = $categoryErr = $quantityErr = $unitPriceErr = $supplierIdErr = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
        $error = true;
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['category'])) {
        $categoryErr = "Category is required";
        $error = true;
    } else {
        $category = $_POST['category'];
    }

    if (empty($_POST['quantity'])) {
        $quantityErr = "Quantity is required";
        $error = true;
    } else {
        $quantity = $_POST['quantity'];
    }

    if (empty($_POST['unit_price'])) {
        $unitPriceErr = "Unit price is required";
        $error = true;
    } else {
        $unit_price = $_POST['unit_price'];
    }

    if (empty($_POST['supplier_id'])) {
        $supplierIdErr = "Supplier ID is required";
        $error = true;
    } else {
        $supplier_id = $_POST['supplier_id'];

        // Check if the supplier_id exists in the suppliers table
        $checkSupplierStmt = $pdo->prepare("SELECT id FROM suppliers WHERE id = :supplier_id");
        $checkSupplierStmt->bindParam(':supplier_id', $supplier_id);
        $checkSupplierStmt->execute();

        if ($checkSupplierStmt->rowCount() == 0) {
            $supplierIdErr = "Supplier with this ID does not exist";
            $error = true;
        }
    }

    // If no error, proceed with database insertion
    if (!$error) {
        try {
            // Prepare and execute SQL statement
            $insertStmt = $pdo->prepare("INSERT INTO medicines (name, category, quantity, unit_price, supplier_id) 
                                         VALUES (:name, :category, :quantity, :unit_price, :supplier_id)");
            $insertStmt->bindParam(':name', $name);
            $insertStmt->bindParam(':category', $category);
            $insertStmt->bindParam(':quantity', $quantity);
            $insertStmt->bindParam(':unit_price', $unit_price);
            $insertStmt->bindParam(':supplier_id', $supplier_id);

            $insertStmt->execute();

            // Redirect to view inventory page after successful insertion
            header("Location: view_inventory.php");
            exit();
        } catch (PDOException $e) {
            // Display error message if database operation fails
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Medicine</title>
</head>
<body>
    <h2>Add Medicine</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>
        <span class="error"><?php echo $nameErr; ?></span><br><br>

        Category: <input type="text" name="category" value="<?php echo isset($category) ? $category : ''; ?>" required>
        <span class="error"><?php echo $categoryErr; ?></span><br><br>

        Quantity: <input type="number" name="quantity" value="<?php echo isset($quantity) ? $quantity : ''; ?>" required>
        <span class="error"><?php echo $quantityErr; ?></span><br><br>

        Unit Price: <input type="number" name="unit_price" step="0.01" value="<?php echo isset($unit_price) ? $unit_price : ''; ?>" required>
        <span class="error"><?php echo $unitPriceErr; ?></span><br><br>

        Supplier ID: <input type="number" name="supplier_id" value="<?php echo isset($supplier_id) ? $supplier_id : ''; ?>" required>
        <span class="error"><?php echo $supplierIdErr; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
