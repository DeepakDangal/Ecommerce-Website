<?php
session_start();

// Function to calculate subtotal
function calculateSubtotal($products) {
    $subtotal = 0;
    foreach ($products as $product) {
        $subtotal += $product['quantity'] * $product['price'];
    }
    return $subtotal;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Bazar - Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
</head>
<body>
<div class="col-md-12">
    <nav class="mynav navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="img/pic-1.png" class="pic-1">
            <a class="navbar-brand" href="#">Hamro Bazar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="bazar.php">Home</a>
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
                        <a class="nav-link active" aria-current="page" href="#">Cart<span class="badge bg-danger">
                        <?php
                        if(isset($_SESSION['products'])) {
                            echo count($_SESSION['products']);
                        } else {
                            echo "0";
                        }
                        ?></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">QTY</th>
                <th scope="col">Price</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_SESSION['products'])) {
                $products = $_SESSION['products'];
                $counter = 1;
                foreach ($products as $product) {
                    echo '<tr>';
                    echo '<td>' . $counter . '</td>';
                    echo '<td><img src="' . $product['image'] . '" alt="' . $product['name'] . '" class="img-fluid" style="width: 100px;"></td>';
                    echo '<td>' . $product['name'] . '</td>';
                    echo '<td>' . $product['quantity'] . '</td>';
                    echo '<td>$' . $product['price'] . '</td>';
                    echo '<td>$' . $product['quantity'] * $product['price'] . '</td>';
                    echo '</tr>';
                    $counter++;
                }
            }
            ?>
        </tbody>
    </table>
    <div class="text-right">
        <strong>Total: $<?php echo isset($products) ? calculateSubtotal($products) : "0.00"; ?></strong>
    </div>
    <div class="text-center mt-3">
        <button class="btn btn-success">Checkout</button>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <p>Developed by Deepak Dangal © 2024</p>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
