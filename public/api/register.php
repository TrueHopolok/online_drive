<?php
session_start();

$page = "/register.php";
require_once "../../private/util/auth.php";

require_once "../../private/db/user.php";
if (user_check($username)) {
    $_SESSION['auth_attempted'] = true;
    $_SESSION['auth_username'] = "This username is taken";
    http_response_code(400);
    header("Location: /register.php");
    exit;
}
user_insert($username, password_hash( $password, PASSWORD_DEFAULT));

$_SESSION['auth_attempted'] = false;
$_SESSION['auth'] = true;
$_SESSION['username'] = $username;
http_response_code(303);
header("Location: /");
exit;