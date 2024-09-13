<?php
session_start();
require 'products.php';

// Generate a unique order code
$order_code = bin2hex(random_bytes(8)); // 16-character code

// Get the current date and time
$order_date = date('Y-m-d H:i:s');

// Get cart items
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total_price = 0;

// Calculate the total price
foreach ($cart as $item) {
    $total_price += $item['price'];
}

// Save order data to a file
$order_file = 'orders-' . $order_code . '.txt';
$order_content = "Order Code: $order_code\n";
$order_content .= "Date and Time Ordered: $order_date\n\n";
$order_content .= "Order Items:\n";

foreach ($cart as $item) {
    $order_content .= "Product ID: " . $item['id'] . "\n";
    $order_content .= "Product Name: " . $item['name'] . "\n";
    $order_content .= "Price: " . $item['price'] . "\n\n";
}

$order_content .= "Total Price: $total_price PHP";

// Write to file
file_put_contents($order_file, $order_content);

// Clear the cart
$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <p>Order Code: <?php echo htmlspecialchars($order_code); ?></p>
    <p>Total Price: <?php echo htmlspecialchars($total_price); ?> PHP</p>
</body>
</html>
