<?php
session_start();

if (!empty($_SESSION['username'])) {
    http_response_code(303);
    header("Location: index.php");
    exit;
}

$_SESSION['login_attempted'] = true;

$username = htmlspecialchars(trim($_POST['username']));
$password = htmlspecialchars(trim($_POST['password']));

if (strlen($username) < 3 || strlen($username) > 20) {
    $_SESSION['login_username'] = "Username must be 3-20 characters long";
    header("Location: login.php");
    exit;
}

if (!ctype_alnum($username)) {
    $_SESSION['login_username'] = "Username must consist only english letters and/or numbers";
    header("Location: login.php");
    exit;
}

if (strlen($password) < 8 || strlen($password) > 20) {
    $_SESSION['login_password'] = "Password must be 8-20 characters long";
    header("Location: login.php");
    exit;
}

// TODO
// Check password with existing in db;
// if invalid or do not exists -> $_SESSION['login_error'] = "Username or password are incorrect" -> redirect to login page

// $_SESSION['login_attempted'] = false;
// $_SESSION['username'] = $username;
// http_response_code(303);
// header("Location: index.php");
// exit;