<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $productId = $_GET["updateid"];
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    if($_FILES["productImage"]["error"] === 4) {
        echo "<script>alert('Image does not exist');</script>";
    }
    else {
        $fileName = $_FILES["productImage"]["name"];
        $fileSize = $_FILES["productImage"]["size"];
        $tmpName = $_FILES["productImage"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg','png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid image extension');</script>";
        }
        else if($fileSize > 1000000) {
            echo "<script>alert('Image size is too large');</script>";
        }
        else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, "../images/" . $newImageName);
            echo "<script>alert('okee');</script>";
        }
    }
    try {
        require_once "dbh.inc.php";
        $query = "UPDATE products SET productName = :productName, productPrice = :productPrice, productImage = :productImage WHERE id = :productId;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":productName", $productName);
        $stmt->bindParam(":productPrice", $productPrice);
        $stmt->bindParam(":productImage", $newImageName);
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
?>