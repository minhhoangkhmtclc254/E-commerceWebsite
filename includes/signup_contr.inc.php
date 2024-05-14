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
function is_username_taken(object $pdo, string $userName) {
    if(get_username($pdo, $userName)) {
        return true;
    }
    else {
        return false;
    }
}
function is_username_invalid(string $userName) {
    if(!filter_var($userName, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}
function is_password_invalid(string $userPassword) {
    $pattern = '/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[A-Z]).{8,}$/';
    if (!preg_match($pattern, $userPassword)) {
        return true;
    } else {
        return false;
    }
}
function create_user(object $pdo, string $userName, string $userPassword) {
    set_user($pdo, $userName, $userPassword);
}