<?php
require 'conf.php'; 

try {
    $stmt = $pdo->query("SELECT id, name, email FROM users ORDER BY name ASC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching users: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
    <style>
        body {
            background-color: pink;
        }
    </style>
</head>
<body class="container mt-5">

    <h2>Registered Users</h2>

    <?php if (count($users) > 0): ?>
        <ol>
            <?php foreach ($users as $user): ?>
                <li>
                    <?= htmlspecialchars($user['name']) ?> (<?= htmlspecialchars($user['email']) ?>)
                </li>
            <?php endforeach; ?>
        </ol>
    <?php else: ?>
        <p>No users have signed up yet.</p>
    <?php endif; ?>

</body>
</html>