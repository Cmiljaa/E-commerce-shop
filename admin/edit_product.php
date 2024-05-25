<?php 

require_once '../app/classes/User.php';
require_once '../app/config/config.php';
require_once '../app/classes/Product.php';

$user = new User();

if(!$user->isLogged() || !$user->isAdmin()){
    header("Location: ../login.php");
    exit();
}
else{
    
    $product = new Product();

    $products = $product -> read($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['image'];

        $product->update($product_id, $name, $price, $size, $image);

        header("Location: edit_product.php?id=". $product_id);
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Edit Product</title>
</head>

<body>

    <div class="container" style="margin-top: 60px;">
        <form action="" method="POST">
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="name" id="name" value="<?= $products['name'] ?>">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="price" step="0.01" id="price" value="<?= $products['price'] ?>">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="size" id="size" value="<?= $products['size'] ?>">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="image" id="image" value="<?= $products['image'] ?>">
            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="Update Product">
            </div>
        </form> 
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>