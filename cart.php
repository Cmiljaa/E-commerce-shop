<?php 

require_once 'inc/header.php';
require_once 'app/classes/Cart.php';

if(!$user -> isLogged()){
    $response -> redirect("Location: login.php");
}

$cart = new Cart();

$results = $cart -> getCartItems();

?>

<div class="container">
    <table class="table table-striped" style="text-align: center;">
        <thead>
            <th>Product name</th>
            <th>Price</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Image</th>
        </thead>
        <tbody style="vertical-align: middle;">
            <?php if(count($results) == 0): ?>
                <tr>
                    <td colspan="5">No items found</td>
                </tr>
            <?php else: ?>
                <?php foreach($results as $result): ?>
                    <tr>
                        <td><?=$result['name']; ?></td>
                        <td><?=$result['price']; ?>$</td>
                        <td><?=$result['size']; ?></td>
                        <td><?=$result['quantity']; ?></td>
                        <td><img style="width: 120px; height: 100px;" src="images/<?=$result['image']; ?>" alt="<?=$result['image']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    
    <?php if(count($results) != 0): ?>
        <a href="checkout.php" class="btn btn-success">Checkout</a>
    <?php endif; ?>

</div>

<?php require_once 'inc/footer.php'; ?>