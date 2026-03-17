<?php
require 'db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) 
            VALUES (:username, :password, :email)";

    $stmt = $pdo->prepare($sql);

    $success = $stmt->execute([
        ':username' => $username,
        ':password' => $password,
        ':email' => $email
    ]);

    if ($success) {
        echo "<p>User added successfully!</p>";
    } else {
        echo "<p>Error adding user.</p>";
    }

    exit;
}
?>
