<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Account</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .form {
        background: white;
        padding: 30px;
        width: 350px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
    .form input[type="text"] {
        width: 92%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form h2{
        text-align: center;
        margin-bottom: 20px;
    }
    .form button {
        width: 50%;
        padding: 10px;
        background-color: #007ef5;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        margin: 20px auto 0 auto;
    }
</style>
<body>
    
    <div class="form">
        <h2>Update User</h2>

        <form method="post" action="">
            Username:<br>
            <input type="text" name="username" required>
            <br>
            Password:<br>
            <input type="text" name="password" required>
            <br>
            Email:<br>
            <input type="text" name="email" required>
            <br>
            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>













<!-- 

<?php
require 'db.php';
require 'functions.php';

$error = "";
$item = "";
$price = "";
$qty = "";

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    // Validate numbers
    if (!validateNumber($price) || !validateNumber($qty)) {
        $error = "Price and Quantity must be positive numbers only.";
    } else {
        $total = $price * $qty;

        $sql = "INSERT INTO transactions (item, price, qty, total)
                VALUES (:item, :price, :qty, :total)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':item' => $item,
            ':price' => $price,
            ':qty' => $qty,
            ':total' => $total
        ]);

        // Redirect to list after successful insert
        header("Location: read.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Transaction</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.form {
    background: white;
    padding: 30px;
    width: 350px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}
.form h2 {
    text-align: center;
    margin-bottom: 20px;
}
.form input[type="text"],
.form input[type="number"] {
    width: 92%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.form button {
    width: 50%;
    padding: 10px;
    background-color: #007ef5;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    display: block;
    margin: 20px auto 0 auto;
}
.form button:hover {
    background-color: #013d75;
}
.form a {
    display: block;
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    color: #007ef5;
}
.form a:hover {
    text-decoration: underline;
}
.error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    text-align: center;
    font-size: 14px;
}
</style>
</head>
<body>

<div class="form">
    <h2>Add Transaction</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="">
        Item:
        <input type="text" name="item" value="<?= htmlspecialchars($item) ?>" required>

        Price:
        <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($price) ?>" required>

        Quantity:
        <input type="number" name="qty" value="<?= htmlspecialchars($qty) ?>" required>

        <button type="submit">Save</button>
    </form>

    <a href="read.php">View Transactions</a>
</div>

</body>
</html> -->













































<?php
require 'db.php';
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $sql = "INSERT INTO transactions (item, price, qty, total)
            VALUES (:item, :price, :qty, :total)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total
    ]);
    exit;
}
?>























<!-- 



<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];
$error = "";

// Get existing data
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    // Validate numbers
    if (!validateNumber($price) || !validateNumber($qty)) {
        $error = "Price and Quantity must be positive numbers only.";
    } else {

        $total = $price * $qty;

        $sql = "UPDATE transactions 
                SET item=:item, price=:price, qty=:qty, total=:total
                WHERE id=:id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':item' => $item,
            ':price' => $price,
            ':qty' => $qty,
            ':total' => $total,
            ':id' => $id
        ]);

        header("Location: read.php");
        exit;
    }

    // Keep entered values if error
    $data['item'] = $item;
    $data['price'] = $price;
    $data['qty'] = $qty;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Update Transaction</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form {
        background: white;
        padding: 30px;
        width: 350px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .error {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        text-align: center;
        font-size: 14px;
    }

    .form input[type="text"],
    .form input[type="number"] {
        width: 92%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form button {
        width: 50%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        margin: 20px auto 0 auto;
    }

    .form button:hover {
        background-color: #1e7e34;
    }

    .form a {
        display: block;
        text-align: center;
        margin-top: 15px;
        text-decoration: none;
        color: #007ef5;
    }

    .form a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="form">
    <h2>Update Transaction</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        Item:
        <input type="text" name="item" value="<?= htmlspecialchars($data['item']) ?>" required>

        Price:
        <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($data['price']) ?>" required>

        Qty:
        <input type="number" name="qty" value="<?= htmlspecialchars($data['qty']) ?>" required>

        <button type="submit">Update</button>
    </form>

    <a href="read.php">Back to List</a>
</div>

</body>
</html> -->