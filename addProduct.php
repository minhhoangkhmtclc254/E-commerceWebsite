<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:#a2a4a4">
    <?php include 'navbar.php' ?>
    <div class="container my-5">
        <form action="includes/formhandler.inc.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" name="productName" id="productName" class="form-control" placeholder="Name" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="text" name="productPrice" id="productPrice" class="form-control" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" name="productImage" id="productImage" class="form-control" placeholder="Image" accept=".jpg, .jpeg, .png" value="">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>