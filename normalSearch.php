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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles.css">
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
                    <li class="nav__item">
                        <a href="login.php" class="nav__link">Login</a>
                    </li>
                    <li class="nav__item">
                        <a href="register.php" class="nav__link">Register</a>
                    </li>
                </ul>

                <div class="header__search">
                    <form action="normalSearch.php" method="post">
                        <input type="text" id="live_search" name="search" placeholder="Search for items..." class="form__input">
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
    <section class="products section container">
        <div class="products__container grid">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $search = $_POST['search'];
                $query = "SELECT * FROM products WHERE productName like '$search%';";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $temp = 1;

                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $productName = $result['productName'];
                    $productPrice = $result['productPrice'];
                    $productImage = $result['productImage'];
                    echo '
                            <div class="product__item">
                                <div class="product__banner">
                                    <a href="singleProduct.php?updateid=' . $result['id'] . '" class="product__images">
                                        <img src="images/' . $productImage . '" alt="" class="product__img">
                                    </a>

                                    <div class="product__actions">
                                        <a href="singleProduct.php?updateid=' . $result['id'] . '" class="action__btn" aria-label="Quick View">
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
                                        <h3 class="product__title">' . $productName . '</h3>
                                    </a>
                                    <div class="product__rating">
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div class="product__price flex">
                                        <span class="new__price">' . $productPrice . '</span>
                                        <span class="old__price">' . $productPrice . '</span>
                                    </div>

                                    <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                    <button class="buy-btn"><a href="updateProduct.php?updateid=' . $result['id'] . '" style="text-decoration: none;">Update</a></button>  
                                    <button class="buy-btn"><a href="./includes/productdelete.inc.php?deleteid=' . $result['id'] . '" style="text-decoration: none;">Delete</a></button>
                                </div>
                            </div>
                            ';
                }
            }
            ?>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>