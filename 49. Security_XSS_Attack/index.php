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

if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $statement = $pdo->prepare("UPDATE admins SET username=? WHERE id=?");
    $statement->execute([$username,1]);
}

$statement = $pdo->prepare("SELECT * FROM admins WHERE id=?");
$statement->execute([1]);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo 'Current Username: '.htmlspecialchars($row['username']);
}
?>
<form action="" method="post">
    <input type="text" name="username" autocomplete="off">
    <input type="submit" value="Submit" name="form1">
</form>