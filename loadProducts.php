<?php

    require_once "includes/dbh.inc.php";

    $query = "SELECT * FROM products;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount()) {
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productName = $result['productName'];
            $productPrice = $result['productPrice'];
            echo '<b>Product Name: </b>';
            echo $productName;
            echo '<br>';
            echo '<b>Product Price: </b>';
            echo $productPrice;
            echo '<br>';
        }
    } else {
        echo '<h2 class="text-danger">There are no products!</h2>';
    }
?>