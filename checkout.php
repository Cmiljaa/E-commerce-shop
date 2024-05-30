<?php 

require_once 'inc/header.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/Order.php';

if(!$user -> isLogged()){
    $response -> redirect("Location: login.php");
}

$cart = new Cart();

$cart_items = $cart -> getCartItems();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!isset($_POST['country']) || !isset($_POST['city']) ||!isset($_POST['zip']) ||!isset($_POST['address'])){
        $response -> sessionMessage("danger", "Error!");
        exit();
    }

    $order = new Order();

    $delivery_address = $_POST['country'] . ", " . $_POST['city'] . ", " . $_POST['zip'] . ", " . $_POST['address'];

    $order = $order -> create($delivery_address);

    $response -> sessionMessage("success", "Successfully!");
    
    $response -> redirect("Location: orders.php");
}

?>

<form method="POST" action="">
    <div class="form-group mb-3">
        <label for="country">Drzava</label>
        <input type="text" class="form-control" id="country" name="country" required>
    </div>
    <div class="form-group mb-3">
        <label for="city">Grad</label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="form-group mb-3">
        <label for="zip">Postanski broj</label>
        <input type="text" class="form-control" id="zip" name="zip" required>
    </div>
    <div class="form-group mb-3">
        <label for="address">Adresa</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <button type="submit" class="btn btn-primary">Order</button>
</form>

<?php require_once 'inc/footer.php'; ?>