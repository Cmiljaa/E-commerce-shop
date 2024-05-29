<?php
require_once 'inc/header.php';
require_once 'app/classes/Product.php';
require_once 'app/classes/User.php';

if(!$user -> isLogged()){
    $response -> redirect("Location: login.php");
}

$products = new Product();

$products = $products -> getProducts();

?>

<div class="row">
    <?php foreach($products as $product): ?>
    <div class="col-md-4">
        <div class="card">
            <img src="images/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="card-image-top">
            <div class="card-body">
                <h5 class="card-title"><?=$product['name']; ?></h5>
                <p class="card-text"><?=$product['size']; ?></p>
                <p class="card-text"><?=$product['price']; ?>$</p>
                <a href="product.php?product_id=<?= $product['product_id'] ?>" class="btn btn-primary">View Product</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php require_once 'inc/footer.php' ?>
