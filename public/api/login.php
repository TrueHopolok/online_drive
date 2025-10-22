<?php
session_start();

$page = "/login.php";
require_once "../../private/util/auth.php";

// TODO
// Check password with existing in db;
// if invalid or do not exists -> $_SESSION['login_error'] = "Username or password are incorrect" -> redirect to login page

// $_SESSION['login_attempted'] = false;
// $_SESSION['username'] = $username;
// http_response_code(303);
// header("Location: index.php");
// exit;