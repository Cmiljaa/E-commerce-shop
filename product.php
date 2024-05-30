<?php

require_once 'inc/header.php';
require_once 'app/classes/Product.php';
require_once 'app/classes/Cart.php';

$product = new Product();

if(!isset($_GET['product_id'])){
    $response -> sessionMessage("danger", "Error!");
    exit();
}

$product = $product -> read($_GET['product_id']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!isset($_POST['quantity'])){
        $response -> sessionMessage("danger", "Error!");
        exit();
    }

    $product_id = $product['product_id'];

    $user_id = $_SESSION['user_id'];

    $quantity = $_POST['quantity'];

    $cart = new Cart();

    $cart -> addToCart($product_id, $user_id, $quantity);

    $response -> redirect("Location: cart.php");
}


?>

<div class="row">
    <div class="col-lg-6">
        <img class="img-fluid" src="images/<?=$product['image'] ?>" alt="<?=$product['name'] ?>">
    </div>
    <div class="col-lg-6">
        <h2><?=$product['name']; ?></h2>
        <p>Size: <?=$product['size']; ?></p>
        <p>Price: <?=$product['price']; ?>$</p>
        <form action="" method="POST">
            Quantity:
            <input type="number" min = 1 max = 5 name="quantity" class="form-control"><br>
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
</div>

<?php require_once 'inc/footer.php';