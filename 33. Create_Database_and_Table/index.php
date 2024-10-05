<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb001";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE students (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(50))";
    $conn->exec($sql);

    echo "Database is created successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}