<?php
session_start();

if (empty($_SESSION['username'])) {
    http_response_code(401);
    header("Location: index.php");
    exit;
}

unset($_SESSION['username']);
header("Location: index.php");
exit;