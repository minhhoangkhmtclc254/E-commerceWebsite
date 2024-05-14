<?php
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>