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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a.links {
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            display: inline-block;
            text-decoration: none;
            background: lightblue;
            color: #000;
            font-size: 20px;
            margin-right: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div style="width:400px;margin:20px auto;">
    <h2>Student List:</h2>



    <?php
    $per_page = 4;
    $q = $pdo->prepare("SELECT * FROM students");
    $q->execute();
    $total = $q->rowCount();
    
    $total_pages = ceil($total/$per_page);    

    if(!isset($_REQUEST['p'])) {
        $start = 1;
    } else {
        $start = $per_page * ($_REQUEST['p']-1) + 1;
    }

    $j=0;
    $k=0;
    $arr1 = [];
    $res = $q->fetchAll();
    foreach($res as $row) {
        $j++;
        if($j>=$start) {
            $k++;
            if($k>$per_page) {break;}
            $arr1[] = $row['id'];
        }
    }
    ?>
    <?php
    $statement = $pdo->prepare("SELECT * FROM students");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {

        if(!in_array($row['id'],$arr1)) {
            continue;
        }

        echo '<div style="padding:20px;margin-bottom:10px;background:#ddd;">';
        echo 'Name: '.$row['firstname'].' '.$row['lastname'].'<br>';
        echo 'Email: '.$row['email'];
        echo '</div>';
    }    
    
    if(isset($_REQUEST['p'])) {
        if($_REQUEST['p'] == 1) {
            echo '<a class="links" href="javascript:void;" style="background:#ddd;"> << </a>';
        } else {
            echo '<a class="links" href="http://localhost/php_practice/index.php?p='.($_REQUEST['p']-1).'"> << </a>';
        }
    } else {
        echo '<a class="links" href="javascript:void;" style="background:#ddd;"> << </a>';
    }
    

    for($i=1;$i<=$total_pages;$i++) {
        echo '<a class="links" href="http://localhost/php_practice/index.php?p='.$i.'">'.$i.'</a>';
    }

    if(isset($_REQUEST['p'])) {
        if($_REQUEST['p'] == $total_pages) {
            echo '<a class="links" href="javascript:void;" style="background:#ddd;"> >> </a>';
        } else {
            echo '<a class="links" href="http://localhost/php_practice/index.php?p='.($_REQUEST['p']+1).'"> >> </a>';
        }
    } else {
        echo '<a class="links" href="http://localhost/php_practice/index.php?p=2"> >> </a>';
    }


    ?>
    </div>


    
</body>
</html>