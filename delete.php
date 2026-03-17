<?php
require 'db.php';
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
$stmt->execute([':id' => $id]);
 
 
header("Location: read.php");
}

?>