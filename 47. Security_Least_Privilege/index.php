<?php
ob_start();
session_start();

if(isset($_POST['form1'])) {

    if($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {
        $_SESSION['usertype'] = 'Admin';
        header("location: dashboard.php");
    } elseif($_POST['username'] == 'editor' && $_POST['password'] == 'editor123') {
        $_SESSION['usertype'] = 'Editor';
        header("location: dashboard.php");
    } else {
        echo "Error in login!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" autocomplete="off"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Login" name="form1"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>