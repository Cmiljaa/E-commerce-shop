<?php 

require_once 'admin_config.php';

$products = $product -> getProducts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container" style="margin-top: 60px;">
        <a href="add_product.php" class="btn btn-success">Add Product</a>

        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Size</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody style=" vertical-align: middle;">
                <?php if(count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <th scope="row"><?= $product['product_id'] ?></th>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['size'] ?></td>
                            <td><img style="width: 120px; height: 100px;" src="..<?= $product['image'] ?>" alt="..<?= $product['image'] ?>"></td>
                            <td><?= $product['created_at'] ?></td>
                            <td>
                                <a href="edit_product.php?id=<?= $product['product_id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="delete_product.php?id=<?= $product['product_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10">No products found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div>
            <a href="../logout.php"><button class="btn btn-danger">Logout</button></a>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>