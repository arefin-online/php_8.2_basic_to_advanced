<?php include_once('header.php'); ?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<?php
if(isset($_POST['form1'])) {

    try {

        if($_POST['firstname'] == '') {
            throw new Exception("First name can not be empty");
        }

        if($_POST['lastname'] == '') {
            throw new Exception("Last name can not be empty");
        }

        if($_POST['email'] == '') {
            throw new Exception("Email can not be empty");
        }

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is invalid");
        }

        $statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $statement->execute([$_POST['email']]);
        $total = $statement->rowCount();
        if($total) {
            throw new Exception("Email already exists");
        }

        if($_POST['phone'] == '') {
            throw new Exception("Phone can not be empty");
        }

        if($_POST['password'] == '' || $_POST['retype_password'] == '') {
            throw new Exception("Password can not be empty");
        }

        if($_POST['password'] != $_POST['retype_password']) {
            throw new Exception("Passwords must match");
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $token = time();

        $statement = $pdo->prepare("INSERT INTO users (firstname,lastname,email,phone,password,token,status) VALUES (?,?,?,?,?,?,?)");
        $statement->execute([$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phone'],$password,$token,0]);

        
        $link = BASE_URL.'registration-verify.php?email='.$_POST['email'].'&token='.$token;
        $email_message = 'Please click on this link to verify registration: <br>';
        $email_message .= '<a href="'.$link.'">';
        $email_message .= 'Click Here';
        $email_message .= '</a>';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '88481333b65a6b';
            $mail->Password = 'e355f1d8f0b1db';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
        
            $mail->setFrom('contact@example.com');
            $mail->addAddress($_POST['email']);
            $mail->addReplyTo('contact@example.com');
            $mail->isHTML(true);
            $mail->Subject = 'Registration Verification Email';
            $mail->Body = $email_message;
            $mail->send();

            $success_message = 'Registration is completed. An email is sent to your email address. Please check that and verify the registration.';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } catch(Exception $e) {
        $error_message = $e->getMessage();
    }

}
?>

<h2 class="mb_10">Registration</h2>
<?php
if(isset($error_message)) {
    echo '<div class="error">';
    echo $error_message;
    echo '</div>';
}
if(isset($success_message)) {
    echo '<div class="success">';
    echo $success_message;
    echo '</div>';
}
?>
<form action="" method="post">
    <table class="t2">
        <tr>
            <td>First Name</td>
            <td><input type="text" name="firstname" autocomplete="off" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname']; } ?>"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="lastname" autocomplete="off" value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname']; } ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" autocomplete="off" value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" autocomplete="off" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone']; } ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" autocomplete="off"></td>
        </tr>
        <tr>
            <td>Retype Password</td>
            <td><input type="password" name="retype_password" autocomplete="off"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" name="form1"></td>
        </tr>
    </table>
</form>

<?php include_once('footer.php'); ?>