<?php
require 'db.php';

$stmt = $pdo->query("SELECT id, username, email FROM users ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Users List</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 40px 0;
    margin: 0;
}
.container {
    background: white;
    padding: 30px;
    width: 700px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}
.container h2 {
    text-align: center;
    margin-bottom: 20px;
}
.top-link {
    display: block;
    width: 150px;
    text-align: center;
    margin: 0 auto 20px auto;
    padding: 10px;
    background-color: #007ef5;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
}
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}
th {
    background-color: #007ef5;
    color: white;
    padding: 10px;
    text-align: left;
}
td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.action a {
    text-decoration: none;
    padding: 6px 10px;
    border-radius: 5px;
    font-size: 13px;
    margin-right: 5px;
}
.edit {
    background-color: #ffc107;
    color: #333;
}

.delete {
    background-color: #dc3545;
    color: white;
}

td[colspan="4"] {
    text-align: center;
    padding: 15px;
    color: #777;
}
</style>

</head>
<body>

<div class="container">
    <h2>User List</h2>

    <a href="index.php" class="top-link">+ Add New</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php if (count($rows) > 0): ?>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td class="action">
                    <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="delete" 
                       onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>