<?php

// Finds user by provided username, returns its uid and hashed password
// If was not found, returns false
function user_find(string $username): array|bool {
    // TODO
}

// Checks whether or not username is free and returns result
function user_check(string $username): bool {
    // TODO
}

// Inserts a user with provided username and hashed password
function user_insert(string $username, $password): void {
    // TODO
}