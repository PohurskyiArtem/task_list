<?php
    require "db.php";

    unset($_COOKIE['loggeduser']);
    setcookie('loggeduser', null, -1, '/');
    header('Location: ../');
?>
