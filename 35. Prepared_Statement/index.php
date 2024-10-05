<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb001";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare("INSERT INTO students (firstname, lastname, email, phone) VALUES (?,?,?,?)");
    $statement->execute(['Robin','Mahmud','robin@gmail.com','11111111']);


    // $stmt = $conn->prepare("INSERT INTO students (firstname, lastname, email, phone) VALUES (:firstname,:lastname,:email,:phone)");
    // $stmt->bindParam(':firstname', $firstname);
    // $stmt->bindParam(':lastname', $lastname);
    // $stmt->bindParam(':email', $email);
    // $stmt->bindParam(':phone', $phone);
    
    // $firstname = "Sabbir";
    // $lastname = "Ahmed";
    // $email = "sabbir@gmail.com'";
    // $phone = "123456";

    // $stmt->execute();

    echo "Success!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}