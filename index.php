<?php
require 'db.php';

$username = '';
$password = '';
$email = '';
$error = '';
$success = '';

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);


    if (empty($username) || empty($password) || empty($email)) {
        $error = "All fields are required.";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, email) 
                VALUES (:username, :password, :email)";

        $stmt = $pdo->prepare($sql);

        $successExec = $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword,
            ':email' => $email
        ]);

        if ($successExec) {
            $success = "User added successfully!";
            $username = '';
            $password = '';
            $email = '';
        } else {
            $error = "Error adding user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create User Account</title>

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
.form input {
    width: 92%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.form h2 {
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
.error {
    color: red;
    margin-bottom: 10px;
}
.success {
    color: green;
    margin-bottom: 10px;
}
</style>
</head>

<body>
<div class="form">
    <h2>Create User</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <form method="post">
        Username:<br>
        <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" required>

        Password:<br>
        <input type="password" name="password" required>

        Email:<br>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

        <button type="submit" name="submit">Save</button>
    </form>

    <a href="read.php">View Users</a>
</div>
</body>
</html>