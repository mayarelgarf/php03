<?php
define('BASE_PATH', './');
require_once('./logic/products.php');
require_once('./logic/cart.php');
if (isset($_GET['id'])) {
    $product = getProductById($_GET['id']);
    if ($product) {
        removeFromCart($product);
        //var_dump($product);
    }
}
header('Location:cart.php');
?>