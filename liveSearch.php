<?php
    require_once "includes/dbh.inc.php";
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $search = $_POST['input'];
        $query = "SELECT * FROM products WHERE productName LIKE '$search%';";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $temp = 1;
        echo '<div class="search-menu">';
        if($stmt->rowCount()) {
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $productName = $result['productName'];
                $productPrice = $result['productPrice'];
                echo '
                        <div class="search-related">
                            <a href="singleProduct.php?updateid='.$result['id'].'" class="text-light">
                                <span>'.$productName.'</span>
                                <span>'.$productPrice.' $</span>
                            </a>
                        </div>        
                ';
                $temp++;
            }
        }
        echo '</div>';
    }
?>