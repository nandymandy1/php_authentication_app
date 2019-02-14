<?php

session_start();

if ($_SESSION['username'] == null) {
    header('Location: ./login.php');
}

$_SESSION['username'] = null;
$_SESSION['profile_pic'] = null;
$_SESSION['email'] = null;

session_unset();
session_destroy();
header('Location: ./index.php');
