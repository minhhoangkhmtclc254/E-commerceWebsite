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
    <?php 
        include 'navbarNew.php' 
    ?>
    <main class="main">
        <section class="home section--lg">
            <div class="home__container container grid">
                <div class="home__content">
                    <span class="home__subtitle">Hot promotions</span>
                    <h1 class="home__title">Laptop Trending <span>Great Collection</span></h1>
                    <p class="home__description">Save more with coupons & up to 20% off</p>
                    <a href="products.php" class="btn">Shop Now</a>
                </div>
                <img src="images/662db21035c85.png" alt="" class="home__img">
            </div>
        </section>

        <!-- <section class="categories container section">
            <h3 class="section__title"><span>Popular</span> Categories</h3>
            <div class="categories__container swiper">
                <div class="swiper-wrapper">
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone</h3>
                    </a>
                    <a href="products.php" class="category__item swiper-slide">
                        <img src="images/6631adf3d1751.png" alt="" class="category__img">
                        <h3 class="category__title">Iphone 10</h3>
                    </a>
                </div>
                <div class="swiper-button-next">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
            </div>
        </section> -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
<script>
    var swiperCategories = new Swiper(".categories__container", {
        spaceBetween: 24,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
            1400: {
                slidesPerView: 6,
                spaceBetween: 24,
            },
        },
    });
</script>
<!-- <script>
        function fetchData() {
            const xhttp = new XMLHttpRequest()
            xhttp.onload = function() {
                document.getElementById('result').innerHTML = this.responseText
            }
            xhttp.open('GET', 'text.txt', true)
            xhttp.send()
        }
    </script> -->

</html>