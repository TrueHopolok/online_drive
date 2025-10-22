<?php
session_start();

if (!empty($_SESSION['username'])) {
    http_response_code(303);
    header("Location: index.php");
    exit;
}

$_SESSION['register_attempted'] = true;

$username = htmlspecialchars(trim($_POST['username']));
$password = htmlspecialchars(trim($_POST['password']));

if (strlen($username) < 3 || strlen($username) > 20) {
    $_SESSION['register_username'] = "Username must be 3-20 characters long";
    header("Location: register.php");
    exit;
}

if (!ctype_alnum($username)) {
    $_SESSION['register_username'] = "Username must consist only english letters and/or numbers";
    header("Location: register.php");
    exit;
}

if (strlen($password) < 8 || strlen($password) > 20) {
    $_SESSION['register_password'] = "Password must be 8-20 characters long";
    header("Location: register.php");
    exit;
}

// TODO
// check if username is unique, if not say so
// insert into db

// $_SESSION['register_attempted'] = false;
// $_SESSION['username'] = $username;
// http_response_code(303);
// header("Location: index.php");
// exit;