<?php

define("FILE_MAXSIZE", 2_000_000); // 2 mb

session_start();

if (empty($_SESSION['auth'])) {
    http_response_code(401);
    header("Location: /");
    exit;
}

if (empty($_FILES['file'])) {
    http_response_code(400);
    header("Location: /");
    exit;
}

// TODO - total size validation

if ($_FILES['file']['size'] > FILE_MAXSIZE) {
    http_response_code(400);
    header("Location: /");
    exit;
}

// TODO - file name validation

require_once "../../private/db/file.php";
if (file_check($_SESSION['username'], $_FILES['file']['name'])) {
    http_response_code(400);
    header("Location: /");
    exit;
}

file_upload($_SESSION['username'], $_FILES['file']['name']);

mkdir("../../uploads/".$_SESSION['username']);
move_uploaded_file($_FILES['file']['tmp_name'], "../../uploads/".$_SESSION['username']."/".$_FILES['file']['name']);

http_response_code(303);
header("Location: /");
exit;