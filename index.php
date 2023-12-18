<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn php</title>
</head>
<body>
<?php
session_start();

// Sample product data (for demonstration purposes)
$products = [
    ['id' => 1, 'name' => 'Product 1', 'price' => 10.99],
    ['id' => 2, 'name' => 'Product 2', 'price' => 19.99],
    ['id' => 3, 'name' => 'Product 3', 'price' => 7.49],
];

// Add to Cart functionality
if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    if (isset($products[$productId - 1])) {
        $_SESSION['cart'][] = $products[$productId - 1];
    }
}

// Display Cart
function displayCart() {
    echo '<h2>Shopping Cart</h2>';
    echo '<ul>';
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        echo '<li>' . $item['name'] . ' - $' . $item['price'] . '</li>';
        $total += $item['price'];
    }
    echo '</ul>';
    echo '<p>Total: $' . $total . '</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple E-commerce Website</title>
</head>
<body>
    <h1>Welcome to our E-commerce Website</h1>

    <!-- Product List -->
    <h2>Products</h2>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product['name']; ?> -
                $<?php echo $product['price']; ?>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="submit" name="add_to_cart" value="Add to Cart">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Shopping Cart -->
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        displayCart();
    } else {
        echo '<p>Your cart is empty.</p>';
    }
    ?>

    <p><a href="checkout.php">Proceed to Checkout</a></p>
</body>
</html>

</body>
</html>