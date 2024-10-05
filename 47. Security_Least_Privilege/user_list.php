<?php
ob_start();
session_start();
if(!isset($_SESSION['usertype'])) {
    header("location: index.php");
    exit;
} else {
    if($_SESSION['usertype'] == 'Editor') {
        header("location: index.php");
        exit;
    }
}
?>
<h2>User Lists Page</h2>