<?php

session_start();

if (empty($_SESSION['auth'])) {
    http_response_code(401);
    header("Location: /");
    exit;
}

echo "uploading file bruv";