<?php
include_once('header.php');
unset($_SESSION['user']);
header('location: '.BASE_URL.'login.php');
exit;
?>