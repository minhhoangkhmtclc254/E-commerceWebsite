<?php
declare(strict_types = 1);
function get_user(object $pdo, string $userName) {
    $query = "SELECT * FROM users WHERE userName = :userName;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":userName", $userName);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}