<?php

require_once "env.php";

function database_connect(): PDO {
    try {
        $conn = new PDO("mysql:host=".DB_SERVERNAME.";dbname=".DB_DBNAME, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die($e);
    }
}