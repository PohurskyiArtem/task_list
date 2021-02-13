<?php
    require "db.php";

    unset($_COOKIE['user_id']);
    setcookie('user_id', null, -1, '/');
    unset($_COOKIE['user_name']);
    setcookie('user_name', null, -1, '/');
    header('Location: ../');
?>
