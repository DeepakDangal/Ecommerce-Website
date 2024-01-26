<?php
session_start();

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product details from the form submission
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_name])) {
        // If the product is already in the cart, increase its quantity
        $_SESSION['cart'][$product_name]['quantity']++;
    } else {
        // If the product is not in the cart, add it to the cart with quantity 1
        $_SESSION['cart'][$product_name] = array(
            'price' => $product_price,
            'quantity' => 1
        );
    }
}

// Calculate subtotal
$subtotal = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $subtotal += $product['price'] * $product['quantity'];
    }
}
?>

<!-- Display the subtotal -->
<h2>Subtotal: <?php echo '$' . number_format($subtotal, 2); ?></h2>

<!-- Display the cart items -->
<?php if (isset($_SESSION['cart'])): ?>
    <h3>Cart Items:</h3>
    <ul>
        <?php foreach ($_SESSION['cart'] as $product_name => $product): ?>
            <li><?php echo $product_name . ' - Quantity: ' . $product['quantity']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
