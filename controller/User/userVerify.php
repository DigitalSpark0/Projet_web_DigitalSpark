<?php
require_once '../../controller/User/user.php';  
require_once '../../model/userC.php';

if (isset($_GET['token'])) {
    $tokenParts = explode("/", urldecode($_GET['token']));
    
    if(count($tokenParts) < 2) {
        echo "Invalid token format.";
        exit;
    }

    $email = base64_decode($tokenParts[1]);

    $user = new UserCRUD();
    $userObject = $user->getUserByEmail($email);

    if ($userObject) {
        if ($user->verifyUser($userObject['id_utilisateur'])) {
            if ($userObject['Role'] == 1 || $userObject['Role'] == 2) {
                header('Location: ../../view/User/verified.html');
            } else {
                header('Location: ../../view/User/verified.html');
            }
            exit;
        } else {
            echo "User verification failed.";
        }
    } else {
        echo "Invalid token.";
    }
} else {
    echo "Invalid request.";
}
?>