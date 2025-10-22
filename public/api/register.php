<?php
session_start();

$page = "/register.php";
require_once "../../private/util/auth.php";

// TODO
// check if username is unique, if not say so
// insert into db

// $_SESSION['register_attempted'] = false;
// $_SESSION['username'] = $username;
// http_response_code(303);
// header("Location: index.php");
// exit;