<?php 

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST['name'];

    $price = $_POST['price'];

    $size = $_POST['size'];

    $image = $_POST['image'];

    $product -> create($name, $price, $size, $image);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Create Product</title>
</head>

<body>

    <div class="container" style="margin-top: 60px;">
        <h1>Add product</h1>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group mb-3">
                <label for="price">Product Price</label>
                <input type="text" class="form-control" name="price" step="0.01" id="price">
            </div>
            <div class="form-group mb-3">
                <label for="size">Product Size</label>
                <input type="text" class="form-control" name="size" id="size">
            </div>
            <div class="form-group mb-3">
                <label for="image">Product Image</label>
                <input type="text" class="form-control" name="image" id="image">
            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="Add Product">
            </div>
        </form> 
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>