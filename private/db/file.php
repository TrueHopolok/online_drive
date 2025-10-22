<?php

require_once "db.php";

function file_upload(string $username, string $filepath): void {
    $conn = database_connect();
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("INSERT INTO file (username, filepath) VALUES (?, ?);");
        $stmt->execute([$username, $filepath]);
        $conn->commit();
    } catch (PDOException $e) {
        try {
            $conn->rollBack();
        } finally {
            die($e);
        }
    }
}

function file_check(string $username, string $filepath): bool {
    $conn = database_connect();
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("SELECT COUNT(*) AS existance FROM file WHERE username=? AND filepath = ?;");
        $stmt->execute([$username, $filepath]);
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

function file_getlist(string $username): array {
    $conn = database_connect();
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("SELECT filepath FROM file WHERE username = ?;");
        $stmt->execute([$username]);
        $conn->commit();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        try {
            $conn->rollBack();
        } finally {
            die($e);
        }
    }
}