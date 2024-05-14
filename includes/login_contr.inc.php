<?php
declare(strict_types = 1);

function is_input_empty(string $userName, string $userPassword) {
    if(empty($userName) || empty($userPassword)) {
        return true;
    }
    else {
        return false;
    }
}

function is_username_wrong(bool|array $result) {
    if(!$result) {
        return true;
    }
    else {
        return false;
    }
}

function is_password_wrong(string $userPassword, string $hashedPassword) {
    if(!password_verify($userPassword, $hashedPassword)) {
        return true;
    }
    else {
        return false;
    }
}