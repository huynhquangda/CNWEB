<?php
require_once __DIR__ . '/../bootstrap.php';
use CT275\Labs\Product;

$product = new Product($PDO);
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
    && ($product->findProduct($_POST['id'])) !== null
) {
    $product->delete();
}
redirect('/http://ct275-project.localhost/indexProduct.php');