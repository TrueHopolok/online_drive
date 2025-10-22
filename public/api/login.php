<?php
session_start();

$page = "/login.php";
require_once "../../private/util/auth.php";

require_once "../../private/db/user.php";
$data = user_find($username);
if ($data === false || !password_verify($password, $data['password'])) {
    $_SESSION['auth_attempted'] = true;
    $_SESSION['auth_error'] = "Invalid username or password";
    http_response_code(400);
    header("Location: /login.php");
    exit;
}

$_SESSION['auth_attempted'] = false;
$_SESSION['auth'] = true;
$_SESSION['username'] = $username;
http_response_code(303);
header("Location: /");
exit;