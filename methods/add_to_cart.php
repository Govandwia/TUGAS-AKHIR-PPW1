<?php
include 'conect.php'; // Include database connection file

// Check if the required product data is sent via POST method
if (isset($_POST['product_id']) && isset($_POST['quantity']) && isset($_POST['price'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Retrieve cart data from cookie
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Add item to cart
    $cart[] = [
        'product_id' => $product_id,
        'quantity' => $quantity,
        'price' => $price
    ];

    // Store updated cart data in cookie
    setcookie('cart', json_encode($cart), time() + (86400 * 30), '/'); // Cookie expires in 30 days

    // Redirect back to the product detail page or any other appropriate page
    header('Location: product-detail.php?id=' . $product_id);

    // Insert data into order_items table
    $order_id = $_SESSION['order_id'];
    foreach ($cart as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        // Query to insert data into order_items table
        $query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
        mysqli_query($con, $query);
    }

    // Clear the cart cookie after inserting data into order_items table
    setcookie('cart', '', time() - 3600, '/'); // Expire the cookie immediately

    // Display success message
    echo "<script>alert('Berhasil menambahkan item ke keranjang!');</script>";
    exit;
} else {
    // If the product data is incomplete, redirect to the products page or any other appropriate page
    header('Location: products.php');
    exit;
}

// If the query fails to execute, display an error message
if (!mysqli_query($con, $query)) {
    echo "<script>alert('Gagal menambahkan item ke keranjang!');</script>";
}
?>
