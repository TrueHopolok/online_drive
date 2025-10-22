<?php
session_start();

if (empty($_SESSION['auth'])) {
    http_response_code(401);
    header("Location: /");
    exit;
}

session_destroy();
http_response_code(303);
header("Location: /");
exit;