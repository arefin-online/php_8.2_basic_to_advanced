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

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=? LIMIT 1";
echo $sql;
$statement = $pdo->prepare($sql);
$statement->execute([$id]);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($result);
echo "</pre>";

?>