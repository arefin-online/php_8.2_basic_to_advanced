<?php
ob_start();
session_start();
if(!isset($_SESSION['usertype'])) {
    header("location: index.php");
    exit;
}
?>
<h2>Post Page</h2>