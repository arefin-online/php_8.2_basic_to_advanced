<?php
$dbhost = 'localhost';
$dbname = 'testdb001';
$dbuser = 'root';
$dbpass = '';
try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
    echo "Connection error :" . $exception->getMessage();
}


$q = $pdo->prepare("ALTER TABLE students 
                    MODIFY COLUMN phone text");
$q->execute();
//$result = $q->fetchAll(PDO::FETCH_ASSOC);


// echo "<pre>";
// print_r($result);
// echo "</pre>";