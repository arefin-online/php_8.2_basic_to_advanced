<?php
ob_start();
session_start();
unset($_SESSION['usertype']);
header('location: index.php');
exit;
?>