<?php
  include '../conect.php';

// Mendapatkan data dari form atau variabel lainnya
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Query untuk memasukkan data ke tabel order_items
$sql = "INSERT INTO order_items (product_id, quantity) VALUES ('$product_id', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Product berhasil ditambahkan');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>