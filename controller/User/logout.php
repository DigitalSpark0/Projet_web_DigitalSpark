<?php

session_start();

$_SESSION = array();

session_destroy();

header("location: ../../view/User/user.html");
exit();
?>