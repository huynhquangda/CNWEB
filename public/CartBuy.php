<?php
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';


use CT275\Labs\Product;
use CT275\Labs\Cart;




$cart = new Cart($PDO);
$product = new Product($PDO);



$userId = $_GET['userId'];

$cartData = $cart->loadCartsByUserId($userId);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .content-cart {
            margin: 20px;
        }
    </style>

</head>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>
    <div class="row content-cart">
        <div class="col-12">
            <div class="jumbotron">
                <table id="cart" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Ngày mua</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartData as $cart): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($cart->product_name) ?>
                                </td>
                                <td>
                                    <img width="50%" src="image/<?= htmlspecialchars($cart->product_image) ?>"
                                        alt="Product Image">
                                </td>
                                <td>
                                    <?= htmlspecialchars($cart->product_price) ?> $
                                </td>
                                <td>
                                    <?= htmlspecialchars(1) ?>
                                </td>
                                <td>
                                    <?= date("d-m-Y", strtotime($cart->created_at)) ?>
                                </td>

                                <td class="d-flex justify-content-center">

                                    <form class="form-inline ml-1" action="/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $cart->getId() ?>">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-contact">
                                            <i alt="Delete" class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <button class="btn btn-success form-control"><a class="text-white"
                href="http://ct275-project.localhost/Paymen.php?userId=<?php echo $userId ?>">Thanh
                Toán</a></button>

    </div>
    <?php include_once __DIR__ . '/../partials/footer.php' ?>

</body>
<script>
    var cartLoad = <?php echo json_encode($cartData); ?>;
    console.log(cartLoad);
</script>

</html>