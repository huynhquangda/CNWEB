<?php
// Thêm các phần mã xử lý khác (nếu cần)
// require_once 'path/to/Cart.php';
// require_once 'path/to/Product.php';
// require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../src/Cart.php';
include_once __DIR__ . '/../src/Product.php';
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';
use CT275\Labs\Product;
use CT275\Labs\Cart;

$cart = new Cart($PDO);
$product = new Product($PDO);
$userId = $_GET['userId'];

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $product->findProduct($productId);
    $cart->idUser = $userId; // Thay đổi giá trị user_id theo nhu cầu của bạn
    $cart->addProduct($product);

    // Trả về phản hồi (nếu cần)
    echo 'Sản phẩm đã được thêm vào giỏ hàng thành công!';
}
?>