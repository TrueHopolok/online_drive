<?php

require_once "db.php";

// Finds user by provided username, returns its uid and hashed password
// If was not found, returns false
function user_find(string $username): array|bool {
    $conn = database_connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("SELECT id, password FROM user WHERE username=?;");
        $stmt->execute([$username]);
        $conn->commit();

        return $stmt->fetch();
    } catch (PDOException $e) {
        try {
            $conn->rollBack();
        } finally {
            die($e);
        }
    }
}

// Checks whether or not username is taken and returns result
// True means taken
function user_check(string $username): bool {
    $conn = database_connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("SELECT COUNT(*) AS existance FROM user WHERE username=?;");
        $stmt->execute([$username]);
        $conn->commit();

        $row = $stmt->fetch();
        if ($row === false) return false;
        return $row["existance"] === 1;
    } catch (PDOException $e) {
        try {
            $conn->rollBack();
        } finally {
            die($e);
        }
    }
}

// Inserts a user with provided username and hashed password
function user_insert(string $username, string $password): void {
    $conn = database_connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?);");
        $stmt->execute([$username, $password]);
        $conn->commit();
    } catch (PDOException $e) {
        try {
            $conn->rollBack();
        } finally {
            die($e);
        }
    }
}