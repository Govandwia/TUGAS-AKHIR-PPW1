<?php
include 'conect.php'; // Include database connection file

// Check if cart cookie exists
if (isset($_COOKIE['cart'])) {
    // Retrieve cart data from cookie
    $cart = json_decode($_COOKIE['cart'], true);

    // Make sure cart is not empty
    if (!empty($cart)) {
        // Calculate total price
        $total = 0;
        foreach ($cart as $item) {
            $subtotal = $item['quantity'] * $item['price'];
            $total += $subtotal;
        }

        // Insert new order into orders table
        $query = "INSERT INTO orders (total) VALUES ($total)";
        mysqli_query($conn, $query);

        // Get the newly created order ID
        $order_id = mysqli_insert_id($conn);

        // Update order ID in order_items table
        foreach ($cart as $item) {
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];
            $price = $item['price'];

            // Add item to order_items table
            $query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, $product_id, $quantity, $price)";
            mysqli_query($conn, $query);
        }

        // Delete cart cookie after checkout
        setcookie('cart', '', time() - 3600);
        // Show success message
        echo "<script>alert('Pembelian berhasil');</script>";
        exit;
    }
}

// If cart is empty or cart cookie doesn't exist, redirect to products page or appropriate page
header('Location: products.php');
exit;
?>
