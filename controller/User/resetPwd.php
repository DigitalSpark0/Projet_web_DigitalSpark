<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require_once 'C:/xampp/htdocs/ProjetWebQH/config.php';
require_once '../../controller/User/user.php';
require_once '../../model/userC.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];
    $tokenParts = explode(".", $token);
    $encodedEmail = $tokenParts[1];
    $email = base64_decode($encodedEmail);
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Reset Password</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f3f8;
                margin: 0;
                padding: 20px;
                text-align: center;
            }

            h2 {
                color: #1e1e2d;
            }

            form {
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            label {
                margin-bottom: 10px;
            }

            input[type="password"] {
                padding: 8px;
                margin-bottom: 15px;
                border-radius: 5px;
                border: 1px solid #ccc;
                width: 250px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                padding: 10px 20px;
                background-color: #F4BE37;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                text-transform: uppercase;
            }

            input[type="submit"]:hover {
                background-color: #F5C568;
            }
        </style>
        <script>
            function validateForm() {
                var password = document.getElementById('new_password').value;
                var hasErrors = false;
                var passwordRegex = /^(?=.*\d|.*\W)(?=.*[A-Z])(?=.*[a-z]).{8,}$/;
                var errorField = document.getElementById('Password_error');

                if (password.length < 8) {
                    errorField.textContent = 'Password must be at least 8 characters long.';
                    hasErrors = true;
                }
                else if (!passwordRegex.test(password)) {
                    errorField.textContent = 'Password must contain at least 8 characters, including uppercase, lowercase, number, and special character.';
                    hasErrors = true;
                } else {
                    errorField.textContent = '';
                }

                return !hasErrors;
            }
        </script>

    </head>

    <body>
        <h2>Reset Your Password</h2>
        <form method="post" action="resetPwd.php">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <input type="hidden" name="Email" value="<?php echo $email; ?>">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password">
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <span id="Password_error" style="color: red;"></span>
            <input type="submit" value="Reset Password">
        </form>
    </body>

    </html>

    <?php
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['token']) || isset($_POST['Email']))) {
    $token = $_POST['token'];
    $tokenParts = explode(".", $token);
    $encodedEmail = $tokenParts[1];
    $email = base64_decode($encodedEmail);
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    if ($newPassword !== $confirmPassword) {
        echo "Passwords  do not match!";
        return;
    }
    $cnx = Config::getConnexion();
    $select = $cnx->prepare("SELECT password FROM user WHERE Email = ?");
    $select->execute([$email]);
    $oldPassword = $select->fetchColumn();
    if ($newPassword == $oldPassword) {
        echo "The new password cannot be the same as the old one!";
        return;
    }
    $update = $cnx->prepare("UPDATE user SET password = ? WHERE Email = ?");
    $update->execute([$newPassword, $email]);
    header('Location: ../../view/User/success.html');
} else {
    echo "Invalid request!";
}
?>