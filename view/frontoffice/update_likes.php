<?php
session_start();

// Fonction pour récupérer les likes d'un utilisateur sur un commentaire
function getUserLikes($userId) {
    if (!isset($_SESSION['user_likes'][$userId])) {
        $_SESSION['user_likes'][$userId] = [];
    }
    return $_SESSION['user_likes'][$userId];
}

// Fonction pour ajouter un like d'un utilisateur sur un commentaire
function addUserLike($userId, $commentId) {
    $_SESSION['user_likes'][$userId][] = $commentId;
}

// Vérifie si un utilisateur a déjà aimé un commentaire
function userLikedComment($userId, $commentId) {
    $userLikes = getUserLikes($userId);
    return in_array($commentId, $userLikes);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'like') {
        // Vérifie si l'utilisateur a déjà aimé ce commentaire
        $userId = $_SESSION['user_id'];
        $commentId = $_POST['comment_id'];
        if (!userLikedComment($userId, $commentId)) {
            addUserLike($userId, $commentId);
            // Mettez à jour le nombre total de likes ici si nécessaire
        }
    } elseif ($_POST['action'] === 'dislike') {
        // Vous pouvez implémenter la suppression du like ici si nécessaire
    }
}
?>
