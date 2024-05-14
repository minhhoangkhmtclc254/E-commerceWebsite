<?php
    require_once "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
        include 'navbarNew.php' 
    ?>
    <?php
    echo '<div class="container my-5">';
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $productId = $_GET["updateid"];
    }
    $query = "SELECT * FROM products WHERE id = :productId;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":productId", $productId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $productImage = $result["productImage"];
    $productPrice = $result["productPrice"];
    ?>
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <?php
                    echo '<img class="img-fluid w-100 pb-1" src="images/'.$productImage.'" id="mainImg">'; 
                ?>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="images/662db21035c85.png" width="100%" height="120vh" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="images/66330b38acd45.png" width="100%" height="120vh" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="images/66330b8000f72.png" width="100%" height="120vh" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="images/66330b1b5a93d.png" width="100%" height="120vh" class="small-img" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <?php echo'<h2>'.$productPrice.' $</h2>'; ?>
                <input type="number" value="1">
                <button class="buy-btn">Add To Cart</button>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");
        for(let i = 0; i < 4; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src;
            }
        }
    </script>
</body>
</html>