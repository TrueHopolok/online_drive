<?php
session_start();

if (!empty($_SESSION['auth'])) {
    http_response_code(303);
    header("Location: /");
    exit;
}

$title = "Register";
require_once "../private/tmpl/header.php";

$page = "/api/register.php";
require_once "../private/tmpl/auth.php";
$_SESSION['auth_attempted'] = false;

require_once "../private/tmpl/footer.php";

?>