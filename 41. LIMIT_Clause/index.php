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

$q = $pdo->prepare("SELECT * FROM students ORDER BY id ASC LIMIT 3,2");
$q->execute();
$result = $q->fetchAll(PDO::FETCH_ASSOC);

echo '<table>';
echo '<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>';
foreach($result as $row) {
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['firstname'].'</td>';
    echo '<td>'.$row['lastname'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['phone'].'</td>';
    echo '</tr>';
}
echo '</table>';

// echo "<pre>";
// print_r($result);
// echo "</pre>";