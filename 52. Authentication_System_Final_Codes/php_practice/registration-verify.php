<?php
include_once('header.php');
if(!isset($_REQUEST['email'])||!isset($_REQUEST['token'])) {
    header('location: '.BASE_URL);
}

$statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND token=?");
$statement->execute([$_REQUEST['email'],$_REQUEST['token']]);
$total = $statement->rowCount();
if($total) {
    $statement = $pdo->prepare("UPDATE users SET token=?, status=? WHERE email=? AND token=?");
    $statement->execute(['',1,$_REQUEST['email'],$_REQUEST['token']]);
    header('location: '.BASE_URL.'registration-success.php');
} else {
    header('location: '.BASE_URL);
}

?>