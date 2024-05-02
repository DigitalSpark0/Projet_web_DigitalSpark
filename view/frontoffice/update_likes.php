<?php
session_start();

if (!isset($_SESSION['num_likes'])) {
    $_SESSION['num_likes'] = 0;
}

if ($_POST['action'] === 'like') {
    $_SESSION['num_likes']++;
} elseif ($_POST['action'] === 'dislike') {
    $_SESSION['num_likes']--;
}

echo $_SESSION['num_likes'];
?>
