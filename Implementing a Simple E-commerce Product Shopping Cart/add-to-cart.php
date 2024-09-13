<?php
session_start();
require 'products.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Find the product
    $product = array_filter($products, function($p) use ($product_id) {
        return $p['id'] === $product_id;
    });
    
    $product = array_shift($product);
    
    if ($product) {
        // Add product to cart
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = $product;
        }
    }
}

// Redirect to the cart
header('Location: cart.php');
exit();
