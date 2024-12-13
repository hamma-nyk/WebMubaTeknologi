<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
} else {
    $_SESSION=[];
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;   
}
?>