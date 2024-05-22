<?php 

require_once 'inc/header.php';
require_once 'app/config/config.php';
require_once 'app/classes/Cart.php';

$cart = new Cart();

$results = $cart -> get_cart_items();

?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <th>Product name</th>
            <th>Size</th>
            <th>Price</th>
            <th>Image</th>
        </thead>
        <tbody>
            <?php foreach($results as $result): ?>
                <tr>
                    <td><?=$result['name']; ?></td>
                    <td><?=$result['price']; ?></td>
                    <td><?=$result['size']; ?></td>
                    <td><img src="<?=$result['image']; ?>" alt=""></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <a href="checkout.php" class="btn btn-success">Checkout</a>
</div>

<?php require_once 'inc/footer.php'; ?>