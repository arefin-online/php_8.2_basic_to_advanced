<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="wrapper">
        <div class="container">

            <div class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="registration.php">Registration</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

            <div class="main">
                <h2 class="mb_10">Login</h2>
                <form action="" method="post">
                    <table class="t2">
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Login" name="form1">
                                <a href="forget-password.php" class="primary_color">Forget Password</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="copyright mt_10">
            Copyright &copy; Morshedul Arefin. All Rights Reserved.
        </div>
    </div>
    
</body>
</html>