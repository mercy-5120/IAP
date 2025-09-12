<?php

//Load Composer's autoloader (created by composer, not included with PHPMailer)

require_once 'conf.php';

$directories = ["Forms", "Global", 
                "Layouts"];

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__  . "/$directory/" . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});

$ObjSendMail = new SendMail();
$ObjForm = new forms();
$ObjLayout = new layouts();

// Database connection
$host = "localhost";
$user = "root";
$pass = "root";   // your MariaDB password 
$dbname = "iap";  // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users in ascending order by name
$sql = "SELECT id, name, email FROM users ORDER BY name ASC";
$result = $conn->query($sql);

echo "<h2>Registered Users</h2>";

if ($result->num_rows > 0) {
    echo "<ol>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['email']) . ")</li>";
    }
    echo "</ol>";
} else {
    echo "<p>No users registered yet.</p>";
}

$conn->close();
?>