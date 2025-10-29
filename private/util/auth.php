<?php

if (!empty($_SESSION['auth'])) {
    http_response_code(303);
    header("Location: /");
    exit;
}

unset($_SESSION['auth_username'], $_SESSION['auth_password'], $_SESSION['auth_error'], $_SESSION['auth_attempted']);

$username = htmlspecialchars(trim($_POST['username']));
$password = htmlspecialchars(trim($_POST['password']));
$failed = false;

if (strlen($username) < 3 || strlen($username) > 20) {
    $_SESSION['auth_username'] = "Username must be 3-20 characters long";
    $failed = true;
} elseif (!ctype_alnum($username)) {
    $_SESSION['auth_username'] = "Username must consist only english letters and/or numbers";
    $failed = true;
}

if (strlen($password) < 8 || strlen($password) > 20) {
    $_SESSION['auth_password'] = "Password must be 8-20 characters long";
    $failed = true;
}

$_SESSION['auth_attempted'] = $failed;
if ($failed) {
    http_response_code(400);
    header("Location: $page");
    exit;
}
