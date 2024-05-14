<?php
declare(strict_types = 1);

function get_username(object $pdo, string $userName) {
    $query = "SELECT userName FROM users WHERE userName = :userName;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":userName", $userName);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_user(object $pdo, string $userName, string $userPassword) {
    $query = "INSERT INTO users (userName, userPassword) VALUES (:userName, :userPassword);";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12
    ];
    $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(":userName", $userName);
    $stmt->bindParam(":userPassword", $hashedPassword);
    $stmt->execute();

}