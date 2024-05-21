<?php

require_once 'inc/header.php';
require_once 'app/classes/Product.php';

echo $_GET['product_id'];

$product = new Product();

$product = $product -> read($_GET['product_id']);

?>

<div class="row">
    <div class="col-lg-6">
        <img class="img-fluid" src="<?=$product['image'] ?>" alt="<?=$product['name'] ?>">
    </div>
    <div class="col-lg-6">
        <h2><?=$product['name']; ?></h2>
        <p>Size: <?=$product['size']; ?></p>
        <p>Price: <?=$product['price']; ?>$</p>
        <form action="" mathod="POST">
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
</div>

<?php require_once 'inc/footer.php';