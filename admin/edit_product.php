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

<form action="" method="POST">
    <input type="text" name="name" id="name" value="<?= $products['name'] ?>">
    <input type="text" name="price" step="0.01" id="price" value="<?= $products['price'] ?>">
    <input type="text" name="size" id="size" value="<?= $products['size'] ?>">
    <input type="text" name="image" id="image" value="<?= $products['image'] ?>">
    <input type="submit" value="Update Product">
</form>