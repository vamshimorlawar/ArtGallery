<?php
    session_start();
    require 'db.php';
    session_destroy();
    header('location:login.php?logout=success');
?>