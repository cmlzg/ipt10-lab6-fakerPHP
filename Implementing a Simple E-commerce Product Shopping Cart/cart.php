<?php
session_start();
require 'products.php';

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php $total_price = 0; ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['name']); ?> - <?php echo htmlspecialchars($item['price']); ?> PHP
                </li>
                <?php $total_price += $item['price']; ?>
            <?php endforeach; ?>
            <li><strong>Total: <?php echo htmlspecialchars($total_price); ?> PHP</strong></li>
        <?php else: ?>
            <li>Your cart is empty.</li>
        <?php endif; ?>
    </ul>

    <a href="reset-cart.php">Clear my cart</a>
    <a href="place_order.php">Place the order</a>
</body>
</html>
