<?php
session_start();

// Function to add product to cart
function addToCart($name, $price, $image) {
    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = array();
    }
    
    // Check if the product is already in the cart
    foreach ($_SESSION['products'] as &$product) {
        if ($product['name'] === $name) {
            $product['quantity']++;
            return;
        }
    }

    // If the product is not in the cart, add it
    $product = array(
        'name' => $name,
        'price' => $price,
        'quantity' => 1,
        'image' => $image
    );
    $_SESSION['products'][] = $product;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_name']) && isset($_POST['product_price'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = 'img/' . strtolower($product_name) . '.jpg';

        // Add the product to the cart
        addToCart($product_name, $product_price, $product_image);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hamro Bazar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
</head>
<body>
<div class="call-md-12">
    <nav class="mynav navbar navbar-expand-lg navbar-light navbar bg-light">
        <div class="container">
            <img src="img/pic-1.png" class="pic-1">
            <a class="navbar-brand" href="#">Hamro Bazar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cart.php">Cart
                        <?php
                        if(isset($_SESSION['products'])) {
                            echo '<span class="badge bg-danger">' . count($_SESSION['products']) . '</span>';
                        } else {
                            echo '<span class="badge bg-danger">0</span>';
                        }
                        ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center hero-text">
                <h1>Welcome To Our Grocery</h1>
                <h4>Buy all fresh and cheap food here!!</h4><br>
                <button class="btn btn-success">Shop Now</button>
            </div>
            <div class="col-md-6">
                <img src="img/grocery.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>

<div class="product-area text-center">
    <br>
    <h3>Our Products</h3>
    <br>
    <div class="container">
        <div class="row">
            <?php
            // Define product details
            $products = array(
                array("name" => "Apple", "price" => "7.6"),
                array("name" => "Orange", "price" => "10.6"),
                array("name" => "Banana Packet", "price" => "18.6"),
                array("name" => "Roman Lettuce", "price" => "2.6"),
                array("name" => "Green Peppers", "price" => "4.64")
            );

            // Loop through products to display them
            foreach ($products as $product) {
                echo '<div class="product-item col-md-4">';
                echo '<img src="img/' . strtolower($product["name"]) . '.jpg"  class="img-fluid" alt="">';
                echo '<h4>' . $product["name"] . '</h4><br>';
                echo '<h4>CAD ' . $product["price"] . '$</h4>';
                echo '<form action="" method="post">'; // Changed action to empty string
                echo '<input type="hidden" name="product_name" value="' . $product["name"] . '">';
                echo '<input type="hidden" name="product_price" value="' . $product["price"] . '">';
                echo '<button class="btn btn-success" type="submit">Add to Cart</button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <p>Developed by Deepak 2024</p>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
