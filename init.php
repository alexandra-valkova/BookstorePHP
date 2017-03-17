<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'bookstore');
    $mysqli->set_charset('utf8');
?>