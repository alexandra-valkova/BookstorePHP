<?php
    if ($_SESSION['type'] != 1) {
        header('Location: login.php');
        exit;
    }
?>