<?php
    require_once "includes/dbh.inc.php";
    require_once "includes/config_session.inc.php";
    require_once "includes/signup_view.inc.php";
    require_once "includes/login_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles.css">
    <style>
        .pagination a {
            color: coral;
        }
        .pagination li:hover a {
            color: #fff;
            background-color: coral;
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="products.php" class="nav__link">Product</a>
                    </li>
                    <?php
                        if(!isset($_SESSION["user_id"])) { ?>
                            <li class="nav__item">
                                <a href="login.php" class="nav__link">Login</a>
                            </li>
                            <li class="nav__item">
                                <a href="signup.php" class="nav__link">Register</a>
                            </li>
                    <?php } 
                        else { ?>
                            <li class="nav__item">
                                <a class="nav__link" href="#">
                                    <i class="fas fa-user"></i>
                                </a>
                                <a class="nav__link" href="#">
                                <?php 
                                    output_username();
                                ?>
                                </a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__link" aria-current="page" href="includes/logout.php">Logout</a>
                            </li>
                    <?php } ?>
                </ul>

                <div class="header__search">
                    <form action="normalSearch.php" method="post">
                        <input type="text" id="live_search" name="search" placeholder="Search for items..." class="form__input" autocomplete="off">
                        <button class="search__btn" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <div id="search_result"></div>
                    </form>
                </div>

                <div class="header__user-actions">
                    <a href="" class="header__action-btn">
                        <i class="fa-solid fa-heart"></i>
                        <span class="count">3</span>
                    </a>
                    <a href="" class="header__action-btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="count">3</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <section id="featured" class="my-5 pb-5">
        <div class="container text-center">
            <h3 style="color: var(--first-color);">Our Products</h3>
            <hr class="mx-auto">
            
            <p style="color: var(--first-color);">Here you can check out our new products</p>
        </div>
        <section class="products section container">
            <div class="products__container grid">
                <?php       
                    $query = "SELECT * FROM products;";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    $total_records = $stmt->rowCount();
                    $total_records_per_page = 8;
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);

                    if(isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }
                    else {
                        $page = 1;
                    }
                    $starting_limit = ($page - 1) * $total_records_per_page;
                    $query = "SELECT * FROM products LIMIT ".$starting_limit.','.$total_records_per_page.";";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $productName = $result['productName'];
                        $productPrice = $result['productPrice'];
                        $productImage = $result['productImage'];
                        echo '
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="" class="product__images">
                                    <img src="images/'.$productImage.'" alt="" class="product__img">
                                </a>

                                <div class="product__actions">
                                    <a href="" class="action__btn" aria-label="Quick View">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a href="" class="action__btn" aria-label="Add To Wishlist">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                    <a href="" class="action__btn" aria-label="Compare">
                                        <i class="fa-solid fa-shuffle"></i>
                                    </a>
                                </div>

                                <div class="product__badge light-pink">Hot</div>
                            </div>

                            <div class="product__content">
                                <span class="product__category">Clothing</span>
                                <a href="detail.php">
                                    <h3 class="product__title">'.$productName.'</h3>
                                </a>
                                <div class="product__rating">
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="product__price flex">
                                    <span class="new__price">'.$productPrice.'</span>
                                    <span class="old__price">'.$productPrice.'</span>
                                </div>

                                <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                <button class="buy-btn"><a href="updateProduct.php?updateid='.$result['id'].'" style="text-decoration: none;">Update</a></button>  
                                <button class="buy-btn"><a href="./includes/productdelete.inc.php?deleteid='.$result['id'].'" style="text-decoration: none;">Delete</a></button>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
        
            <!-- <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="addProduct.php" class="text-light" style="text-decoration: none;"><img class="img-fluid mb-3" src="https://t4.ftcdn.net/jpg/01/26/10/59/360_F_126105961_6vHCTRX2cPOnQTBvx9OSAwRUapYTEmYA.jpg" alt=""></a>
            </div> -->
            <!-- <a href="addProduct.php" class="product__images">
                <img src="https://t4.ftcdn.net/jpg/01/26/10/59/360_F_126105961_6vHCTRX2cPOnQTBvx9OSAwRUapYTEmYA.jpg" alt="" class="product__img">
            </a> -->
            <nav aria-label="Page navigation">
                <ul class="pagination mt-5 mx-auto">
            <?php
            for($btn = 1; $btn <= $total_no_of_pages; $btn++) {
                echo'
                <li class="page-item"><a class="page-link" href="?page='.$btn.'">'.$btn.'</a></li>';
            }
            ?>
            <?php
            echo '
                </ul>
            </nav>';
            ?>
        </section>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val()
                if(input != "") {
                    $.ajax({
                        url: "liveSearch.php",
                        method: "POST",
                        data: {input:input},
                        success: function(data) {
                            $("#search_result").html(data)
                            $("#search_result").css("display", "block")
                        }
                    })
                }
                else {
                    $("#search_result").css("display", "none")
                }
            })
        })
    </script>
</body>
</html>