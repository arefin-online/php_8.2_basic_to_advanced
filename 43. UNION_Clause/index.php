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


$q = $pdo->prepare("SELECT s.firstname,ci.city_name,co.country_name 
                    FROM students s

                    JOIN cities ci
                    ON s.city_id = ci.city_id

                    JOIN countries co
                    ON s.country_id = co.country_id

                    WHERE co.country_name = ?
");
$q->execute(['USA']);
$result = $q->fetchAll(PDO::FETCH_ASSOC);



// $q = $pdo->prepare("SELECT * FROM cities WHERE city_name = ?");
// $q->execute(['Dhaka']);
// $result = $q->fetchAll(PDO::FETCH_ASSOC);
// foreach($result as $row) {

//     $r = $pdo->prepare("SELECT firstname FROM students WHERE city_id = ?");
//     $r->execute([$row['city_id']]);
//     $result1 = $r->fetchAll(PDO::FETCH_ASSOC);
//     foreach($result1 as $row1) {
//         echo $row1['firstname'].'<br>';
//     }

// }




// echo '<table>';
// echo '<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>';
// foreach($result as $row) {
//     echo '<tr>';
//     echo '<td>'.$row['id'].'</td>';
//     echo '<td>'.$row['firstname'].'</td>';
//     echo '<td>'.$row['lastname'].'</td>';
//     echo '<td>'.$row['email'].'</td>';
//     echo '<td>'.$row['phone'].'</td>';
//     echo '</tr>';
// }
// echo '</table>';

echo "<pre>";
print_r($result);
echo "</pre>";