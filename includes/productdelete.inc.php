<?php
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $productId = $_GET["deleteid"];
    try {
        require_once "dbh.inc.php";
        $query = "DELETE FROM products WHERE id = :productId;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":productId", $productId);
        $stmt->execute();
        $pdo = null;
        $stmt = null;
        header("Location: ../products.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php");
}