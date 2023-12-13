<?php
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';


use CT275\Labs\Product;
use CT275\Labs\Cart;
use CT275\Labs\Contact;

$userId = $_GET['userId'];
$cart = new Cart($PDO);
$product = new Product($PDO);
$contact = new Contact($PDO);
// echo $userId;
$cartData = $cart->loadCartsByUserId($userId);
$contactData = $contact->find($userId);
// echo $contactData->name;
// echo $cartData[0]->product_name;
$totalPrice = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .content-paymen {
            margin: 10px 50px;
        }
    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="vi" class="h-100">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Nền tảng - Kiến thức cơ bản về WEB | Bảng tin</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- Font awesome -->
        <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Custom css - Các file css do chúng ta tự viết -->
        <link rel="stylesheet" href="../assets/css/app.css" type="text/css">
    </head>

    <body>
        <!-- header -->
        <?php include_once __DIR__ . '/../partials/navbar.php' ?>
        <!-- end header -->

        <main role="main">
            <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
            <div class="container mt-4">
                <form class="needs-validation" name="frmthanhtoan" method="post" action="#">
                    <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

                    <div class="py-5 text-center">
                        <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                        <h2>Thanh toán</h2>
                        <h1>

                        </h1>
                        <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Giỏ hàng</span>
                                <span class="badge badge-secondary badge-pill">2</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2">
                                <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00">
                                <input type="hidden" name="sanphamgiohang[1][soluong]" value="2">
                                <?php foreach ($cartData as $cart):
                                    $totalPrice += $cart->product_price;
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">
                                                <?php echo $cart->product_name ?>
                                            </h6>
                                            <small class="text-muted">
                                                <?php echo $cart->product_price ?>$ x 1
                                            </small>
                                        </div>
                                        <span class="text-muted">
                                            <?php echo $cart->product_price ?>$
                                        </span>
                                    </li>


                                    <input type="hidden" name="sanphamgiohang[2][sp_ma]" value="4">
                                    <input type="hidden" name="sanphamgiohang[2][gia]" value="14990000.00">
                                    <input type="hidden" name="sanphamgiohang[2][soluong]" value="8">


                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Tổng thành tiền</span>
                                        <strong>
                                            <?php echo $totalPrice ?>$
                                        </strong>
                                    </li>
                                <?php endforeach ?>
                            </ul>


                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Xác nhận</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Thông tin khách hàng</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="kh_ten">Họ tên</label>
                                    <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                        value="<?php echo $contactData->name; ?>" readonly="">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_gioitinh">Giới tính</label>
                                    <input type="text" class="form-control" name="kh_gioitinh" id="kh_gioitinh"
                                        value="Nam" readonly="">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_diachi">Địa chỉ</label>
                                    <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                                        value="130 Xô Viết Nghệ Tỉnh" readonly="">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_dienthoai">Điện thoại</label>
                                    <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                        value="<?php echo $contactData->phone; ?>" readonly="">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_email">Email</label>
                                    <input type="text" class="form-control" name="kh_email" id="kh_email"
                                        value="<?php echo $contactData->email; ?>" readonly="">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_ngaysinh">Ngày sinh</label>
                                    <input type="text" class="form-control" name="kh_ngaysinh" id="kh_ngaysinh"
                                        value="11/6/1989" readonly="">
                                </div>
                                <div class="col-md-12">
                                    <label for="kh_cmnd">CMND</label>
                                    <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd"
                                        value="362209685" readonly="">
                                </div>
                            </div>

                            <h4 class="mb-3">Hình thức thanh toán</h4>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input"
                                        required="" value="1">
                                    <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input"
                                        required="" value="2">
                                    <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input"
                                        required="" value="3">
                                    <label class="custom-control-label" for="httt-3">Ship COD</label>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button id="btn-dat-hang" class="btn btn-primary btn-lg btn-block" type="submit"
                                name="btnDatHang">Đặt
                                hàng</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- End block content -->
        </main>

        <!-- footer -->
        <!-- <?php include_once __DIR__ . '/../partials/footer.php' ?> -->
        <!-- end footer -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/popperjs/popper.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Custom script - Các file js do mình tự viết -->
        <script src="../assets/js/app.js"></script>

    </body>

    </html>

</body>
<script>
    $("#btn-dat-hang").on("click", function () {
        alert("Đã đặt hàng thành công hãy chờ nhận hàng!")
    })
</script>

</html>