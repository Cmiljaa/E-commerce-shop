<?php

require_once 'inc/header.php';
require_once 'app/classes/Order.php';

if(!$user -> isLogged()){
    $response -> redirect("Location: login.php");
}

$order = new Order();
$orders = $order -> getOrders();

?>

<table class="table table-striped" style="text-align: center;">
    <thead>
        <th>Order ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Size</th>
        <th>Image</th>
        <th>Delivery Address</th>
        <th>Order Date</th>
    </thead>
    <tbody style="vertical-align: middle;">
        <?php if(count($orders) == 0): ?>
            <tr>
                <td colspan="10">No orders found</td>
            </tr>
        <?php else: ?>
            <?php foreach($orders as $order): ?>
                <tr>
                <td><?=$order['order_id'] ?></td>
                <td><?=$order['name'] ?></td>
                <td><?=$order['quantity'] ?></td>
                <td><?=$order['price'] ?></td>
                <td><?=$order['size'] ?></td>
                <td><img style="width: 140px; height: 140px;;" src="images/<?=$order['image'] ?>" alt="<?=$order['image'] ?>"></td>
                <td><?=$order['delivery_address'] ?></td>
                <td><?=$order['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
require_once 'inc/footer.php';
 ?>