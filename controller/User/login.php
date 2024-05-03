<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../database/connect.php';
    require_once '../../controller/User/user.php';
    require_once '../../model/User/userC.php';
    require_once '../../controller/User/verifyEmail.php';

    $user = new UserCRUD();
    if (isset($_POST["Email"]) && isset($_POST["Password"])) {
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        $userData = $user->getUserByEmail($email);

        if ($userData == null) {
            echo "<script>alert('Email not found in the database!'); window.location.href='../../view/User/user.html';</script>";
            exit;
        }

        if (isset($userData) && $userData['Email'] == $email && $userData['Password'] == $password) {
           
            if ($userData['Status'] == 0) {
                echo "<script>alert('Your account is not yet verified. Please check your email for the verification link. You must verify your account before you can log in.'); window.location.href='../../view/User/user.html';</script>";
                sendVerificationEmail($email);
                exit;
            }

            if ($userData['Role'] == 1) {
                // Redirection vers le tableau de bord de l'administrateur
                header('Location: ../../view/backoffice/pages/dashboard.html');
                exit;
            } elseif ($userData['Role'] == 2) {
                // Redirection vers le tableau de bord du recruteur
                header('Location: ../../view/backoffice/pages/dashboardR.html');
                exit;
            }
            elseif ($userData['Role'] == 3) {
                // Redirection vers le tableau de bord du recruteur
                header('Location: ../../view/frontoffice/index.php');
                exit;
            }
            elseif ($userData['Role'] == 4) {
                // Redirection vers le tableau de bord du recruteur
                header('Location: ../../view/frontoffice/index.php');
                exit;
            }
            // Enregistrer les informations de l'utilisateur dans la session
            $_SESSION['user_id'] = $userData['id_utilisateur'];
            $_SESSION['username'] = $userData['Email'];
            $_SESSION['password'] = $userData['Password'];
            $_SESSION['firstName'] = $userData["prenom"];
            $_SESSION['lastName'] = $userData["nom"];
            $_SESSION['role'] = $userData["Role"];
            
            exit;
        } else  {
            echo "<script>alert('Invalid email or password!'); window.location.href='../../view/User/user.html';</script>";
        }
    } else {
        echo "<script>alert('Please provide both email and password!'); window.location.href='../../view/User/user.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request method!'); window.location.href='../../view/User/user.html';</script>";
}
?>
