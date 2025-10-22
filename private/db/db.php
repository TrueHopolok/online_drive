<?php

require_once "env.php";

function database_connect(): PDO {
    try {
        $instance = new PDO("mysql:host=".DB_SERVERNAME.";dbname=".DB_DBNAME, DB_USERNAME, DB_PASSWORD);
        return $instance;
    } catch (PDOException $e) {
        die($e);
    }
}