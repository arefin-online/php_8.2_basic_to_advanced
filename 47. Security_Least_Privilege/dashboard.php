<?php
ob_start();
session_start();
if(!isset($_SESSION['usertype'])) {
    header("location: index.php");
    exit;
}
?>
<h1>Welcome to the dashboard</h1>
<p>
    You have logged in as <?php $_SESSION['usertype']; ?>
</p>
<?php
if($_SESSION['usertype'] == 'Admin') {
    ?>
    <a href="post.php">Posts</a>
    <a href="user_list.php">User List</a>
    <?php
}
if($_SESSION['usertype'] == 'Editor') {
    ?>
    <a href="post.php">Posts</a>
    <?php
}
?>
<a href="logout.php">logout</a>