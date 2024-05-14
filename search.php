<?php
    require_once "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./includes/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:#a2a4a4">
    <?php include 'navbar.php' ?>
    <div class="container my-5">
        <form action="normalSearch.php" method="post">
            <input type="text" id="live_search" name="search" placeholder="Search data">
            <button class="btn btn-dark" name="submit">Search</button>
        </form>
    </div>
    <div id="search_result"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script src="search.js"></script> -->
    <script>
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val()
                // alert(input)
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