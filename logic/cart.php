<?php
require_once(BASE_PATH . 'dal/dal.php');
function addProductToCart($product)
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $found = false;
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['product']['id'] === $product['id']) {
            $cart[$i]['quantity'] += 1;
            $found = true;
        }
    }
    if (!$found) {
        array_push($cart, ['product' => $product, 'quantity' => 1]);
    }
    $_SESSION['cart'] = $cart;
}

function getCart()
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    return $cart;
}

function decFromCart($cart_item)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['product']['id'] === $cart_item['id']&& $cart[$i]['quantity'] != 1) {
           $cart[$i]['quantity'] -= 1;
        }
        $_SESSION['cart'] = $cart_item;

    }
}


function Subtotal()
{

    $cart_items = getCart();
    $cart_subtotal = 0;
    foreach ($cart_items as $cart_item) {
        $total_of_item = $cart_item['product']['price'] * $cart_item['quantity'];
        $cart_subtotal += $total_of_item;

    }

    return "$cart_subtotal $";
}

function total()
{

    $cart_subtotal = Subtotal();
    $cart_shipping = 20;
    $cart_total = intval($cart_subtotal) + $cart_shipping;

    return "$cart_total $";
}

function removeFromCart($cart_item,$i){
    if (session_status() === PHP_SESSION_NONE)
    session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
for ($i = 0; $i < count($cart); $i++) {
    if ($cart[$i]['product']['id'] === $cart_item['id']) {
        array_splice($cart, $i, 1);
    }
}
$_SESSION['cart'] = $cart;

}