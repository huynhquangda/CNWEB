<?php
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';


use CT275\Labs\Product;
use CT275\Labs\Cart;

$productId = $_GET['id'];
$userId = $_GET['idUser'];
// echo $productId;
$product = new Product($PDO);

$productFind = $product->findProduct($productId);

$product = $product->allProduct();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <title>DetailBook</title>
</head>
<style>
    .conten-detail-book {
        margin: 30px 50px;
    }

    .book-concern {
        position: relative;
    }

    .btn-scroll-left,
    .btn-scroll-right {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .btn-scroll-left {
        left: 10px;
    }

    .btn-scroll-right {
        right: 10px;
    }

    .img-detail-book {
        padding: 50px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }

    .btn-buy-book {

        height: 50px;
        border: solid 3px orange;
        color: orange;
        background-color: orange;
        color: #ffff;
    }

    .btn-add-cart-book {

        height: 50px;
        border: solid 3px orange;
        color: orange;
    }

    .minus-plus-count {
        margin-left: 20px;
        padding: 10px;
        border: 3px solid orange;
    }

    .price-book {
        color: orange;
        font-size: 25px;
        font-weight: 700;
    }

    .book-name {
        font-size: 17px;
        font-weight: 500;
    }
</style>

<body>

    <?php include_once __DIR__ . '/../partials/navbar.php' ?>
    <?php
    // $subtitle = 'View your all contacs here.';
    ?>

    <?php include_once __DIR__ . '/../partials/footer.php' ?>
    <!-- <h1>
        <?php echo $productFind->name; ?>
    </h1> -->
    <div class="conten-detail-book">
        <div class="row">
            <div class="col-lg-5 text-center">
                <img class="img-detail-book" src="image/<?php echo $productFind->image; ?>" width="70%" alt="">
                <div class="d-flex mt-5">
                    <button name="add-cart" id="btn-add-cart" class="btn-add-cart-book form-control mr-4"><i
                            class="fas fa-cart-arrow-down" style="color:orange"></i>Thêm vào giỏ hàng</button>

                    <button class="btn-buy-book btn-warning form-control"><a
                            href="http://ct275-project.localhost/CartBuy.php?userId=<?php echo $userId ?>"
                            style="color:white">Mua
                            Ngay</a></button>
                </div>
            </div>
            <div class="col-lg-7">
                <h3>
                    <?php echo $productFind->name; ?>
                </h3>
                <div class="d-flex">
                    <p>Nhà xuất bản : </p>
                    <p class="ml-3 text-warning">NXB lao động xã hội</p>
                </div>
                <div class="d-flex">
                    <p>Nhà phát hành : </p>
                    <p class="ml-3 text-warning">Alpha Books</p>
                </div>
                <div class="d-flex">
                    <p>Tác giả : </p>
                    <p class="ml-3 mr-5 text-warning">Alpha Books</p>
                    <!-- <button class="btn btn-primary">Luôn có</button> -->
                </div>
                <div class="d-flex">
                    <p class="text-warning">4.96 </p>
                    <i class="fas fa-star mt-1 ml-3" style="color: yellow"></i>
                    <i class="fas fa-star mx-2 mt-1" style="color: yellow"></i>
                    <i class="fas fa-star mt-1" style="color: yellow"></i>
                    <i class="fas fa-star mt-1 mx-2" style="color: yellow"></i>
                    <i class="fas fa-star mt-1 mr-2" style="color: yellow"></i>

                    <img src="image/icons8-vertical-line-50.png" width="15px" height="33px" alt="">
                    <p><b>23</b> vote</p>
                    <img src="image/icons8-vertical-line-50.png" width="15px" height="33px" alt="">
                    <p><b>10 </b>Đã bán</p>

                </div>
                <div class="d-flex mt-2">
                    <h2 class="text-warning">
                        <?php echo $productFind->price; ?>
                    </h2>
                    <p class="mt-2 ml-3 mr-5" style="text-decoration: line-through;">100 $</p>
                    <button class="btn btn-warning text-white" style="border-radius: 50px;"><b>-50%</b></button>
                </div>

                <div class="d-flex mt-3">
                    <p class="mt-3">Số Lượng:</p>
                    <div class="d-flex minus-plus-count">
                        <i class="fas fa-minus mt-2"></i>
                        <p class="mt-2 mx-5"><b>1</b></p>
                        <i class="fas fa-plus mt-2"></i>

                    </div>
                </div>
                <div class="d-flex mt-3">
                    <p>Vận chuyển: </p>
                    <i class="fas fa-shipping-fast fa-lg ml-3 mt-3" style="color: orange"></i>
                </div>

                <div class="d-flex">
                    <select name="" id="select-province" class="form-control mr-4">
                        <option value="">Thành phố Hồ Chí Minh</option>
                    </select>
                    <select name="" id="" class="form-control">
                        <option value="">Quận 1</option>
                    </select>
                </div>
                <div class="d-flex mt-4">
                    <i class="far fa-dot-circle fa-xs mt-3 mr-3"></i>
                    <p class="mt-1 mr-3">Khối lượng: </p>
                    <p class="mt-1 text-danger "><b>300g</b></p>
                </div>
                <div class="d-flex mb-3">
                    <i class="far fa-dot-circle fa-xs mt-3 mr-3"></i>
                    <p class="mt-1 mr-3">Phí vận chuyển: </p>
                    <p class="mt-1 text-danger "><b>3 $</b></p>
                </div>
                <button class="btn form-control" style="background-color:antiquewhite; height: 50px;">Thông
                    tin khuyến
                    mãi</button>
                <div class="d-flex mt-4">
                    <div class="d-flex ">
                        <i class="far fa-dot-circle fa-xs mt-3 mr-3"></i>
                        <p class="mt-1 mr-3"><b>Tặng</b> <b class="text-danger">BookMark</b> lung linh cho tất cả đơn
                            hàng </p>
                    </div>

                </div>
                <div class="d-flex">
                    <div class="d-flex">
                        <i class="far fa-dot-circle fa-xs mt-3 mr-3"></i>
                        <p class="mt-1 mr-3"><b>Tặng</b> <b class="text-danger">Sổ tay</b> lung linh cho tất cả đơn
                            hàng từ 200k</p>
                    </div>

                </div>
                <div class="d-flex">
                    <div class="d-flex">
                        <i class="far fa-dot-circle fa-xs mt-3 mr-3"></i>
                        <p class="mt-1 mr-3"><b>Freeship 5k </b> cho đơn hàng trên 150k nhập mã là <b
                                class="text-danger">FREE150</b> .Từ ngày 01/11-30/11/2023</p>
                    </div>

                </div>
                <div class="d-flex">
                    <div class="d-flex">
                        <i class="far fa-dot-circle fa-xs mt-3 mr-3"></i>
                        <p class="mt-1 mr-3"><b>Freeship 10k </b> cho đơn hàng trên 150k nhập mã là <b
                                class="text-danger">FREE150</b> .Từ ngày 01/11-30/11/2023</p>
                    </div>

                </div>
                <div class="d-flex">
                    <div class="d-flex">
                        <i class="far fa-dot-circle fa-xs mt-3 mr-3"></i>
                        <p class="mt-1 mr-3"><b>Freeship 30k </b> cho đơn hàng trên 150k nhập mã là <b
                                class="text-danger">FREE150</b> .Từ ngày 01/11-30/11/2023</p>
                    </div>

                </div>






            </div>
        </div>
        <h3 class="my-5">Sản Phẩm Liên Quan</h3>
        <div class="book-concern">
            <div class="row overflow-auto" id="scroll-container">

            </div>
            <button class="btn btn-secondary btn-scroll-left">&lt;</button>
            <button class="btn btn-secondary btn-scroll-right">&gt;</button>
        </div>
        <!-- thong tin san pham -->
        <h3 class="my-5">Thông tin sách</h3>
        <div class="row">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Hình Thức</p>
                        <hr>
                        <p>Trọng lượng</p>
                        <hr>
                        <p>Sô trang</p>
                        <hr>
                        <p>Năm sx</p>
                        <hr>
                        <p>Kích thước</p>
                        <hr>

                    </div>
                    <div class="col-lg-6 text-warning">
                        <p>Bìa mềm</p>
                        <hr>
                        <p>300g</p>
                        <hr>
                        <p>365</p>
                        <hr>
                        <p>2017</p>
                        <hr>
                        <p>13x20.5 cm</p>
                        <hr>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 text-center">
                <img src="image/ac1.jpg" alt="">
            </div>
        </div>
        <hr>
        <p><b class="text-primary">Nghĩ Kiểu Zuck Thành Công Như Facebook </b>Nếu bạn đang lầm lẫn giữa lập nghiệp và
            khởi nghiệp, nếu bạn chưa thể phân biệt được đâu là những nhà khởi
            nghiệp và đâu là những nhà khởi nghiệp nội bộ, nếu bạn đoan chắc tiền là khởi sự và đích đến của kinh doanh.

            <b class="text-warning">Thì cuốn sách này dành cho bạn! Và không chỉ có vậy</b>, thông qua việc tiếp cận,
            phân tích 5 bí quyết kinh
            doanh của vị thuyền trưởng Facebook – Mark Zuckerberg, tác giả Ekaterina Walter còn chỉ ra những phương châm
            có liên quan tới sự sống còn của doanh nghiệp song không phải lúc nào cũng được chú trọng và tuân thủ:

            Hướng đi của một công ty thành công có thể thay đổi, nhưng mục đích đích thực của nó thì không đổi.
            Văn hóa doanh nghiệp là cội rễ phát triển.
            Rủi ro lớn nhất chính là không lĩnh nhận bất cứ rủi ro nào.
            Việc quyết liệt sa thải nhân sự cũng quan trọng không kém gì việc quyết liệt tuyển dụng đúng người.
            Tuyển dụng dựa trên thái độ. Doanh nghiệp có thể đào tạo kĩ năng, song không thể đào tạo đam mê.
            Cuốn sách được trình bày ngắn gọn, súc tích với thí dụ thực tế là các thương hiệu không còn xa lạ: Facebook,
            Apple, Ford, Amazon... sẽ giúp độc giả dễ dàng tiếp nhận thông tin cũng như chắt lọc có hiệu quả những ý
            tưởng khởi nghiệp và nguyên tắc vận hành doanh nghiệp sáng suốt.
        </p>
        <b class="text-warning">Nhận xét của một đọc giả:</b>
        <p class="">" Một cuốn sách tuyệt vời mà tôi từng được biết đến. Bạn biết rồi đấy, Mark Zuckerberg từ lâu đã
            được biết
            đến với cái tên "thần đồng lập trình ". Quả thực Mark Zuckerberg rất tài giỏi trong lĩnh vực lập trình .Ai
            cũng biết những thành tích tuyệt vời của Mark Zuckerberg là xây dựng được Facebook. Ngoài ra Mark Zuckerberg
            còn được biết đến bởi kiểu nghĩ đột phá và rất đáng để học hỏi.Và cuốn sách tuyệt vời này còn có cả những
            bài học vô cùng quý giá để bạn có thể nghĩ đột phá , thúc đẩy cho sự tiến bộ và phát triển vượt bậc của bạn
            .Ngoài ra cuốn sách tuyệt vời này có hình thức đẹp rất truyền cảm hứng cho người đọc. Tôi rất thích sách
            này."</p>
        <p> Ekaterina thảo luận về Facebook và Mark Zuckerberg từ một nơi có kinh nghiệm về truyền thông xã hội với công
            việc của cô tại Intel và mạng truyền thông xã hội cá nhân của riêng cô với hơn 40.000. Cô ấy đã nhận được
            nhiều giải thưởng như 25 Phụ nữ trong công nghệ để theo dõi bởi Huffington Post, 25 Phụ nữ khuấy động mạng
            xã hội vào năm 2012 và nhiều hơn nữa. Think Like Zuck không chỉ là về Facebook mà còn về tinh thần khởi
            nghiệp đã tạo ra Facebook và đó là văn hóa doanh nghiệp thành công, độc đáo. Phá vỡ các bí mật kinh doanh
            xây dựng Facebook và so sánh chúng với các nghiên cứu trường hợp kinh doanh trong thế giới thực khác từ các
            công ty như Zappos và Apple, Ekaterina tiết lộ các yếu tố thiết yếu tạo ra thành công theo cách có thể sử
            dụng và có thể được tái tạo. Các nhà lãnh đạo doanh nghiệp và doanh nhân có thể sử dụng Think Like Zuck để
            phát triển các kỹ năng lãnh đạo của chính họ hoặc để xây dựng đội ngũ của họ. Những bài học quý giá trong
            Think Like Zuck có thể giúp thúc đẩy các kỹ năng lãnh đạo cũng như văn hóa doanh nghiệp, làm việc với mọi
            người và xây dựng ước mơ của bạn."</p>

        <h3 class="my-5">Gợi ý cho bạn</h3>
        <div class="book-concern">
            <div class="d-flex overflow-auto" id="book-sugess">

            </div>
            <button class="btn btn-secondary btn-scroll-left">&lt;</button>
            <button class="btn btn-secondary btn-scroll-right">&gt;</button>
        </div>

    </div>



</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var container = $('#scroll-container');
        var scrollStep = container.width() / 2;

        $('.btn-scroll-left').click(function () {
            container.animate({ scrollLeft: '-=' + scrollStep }, 'slow');
        });

        $('.btn-scroll-right').click(function () {
            container.animate({ scrollLeft: '+=' + scrollStep }, 'slow');
        });
        onLoadPro();

    });

    var productById = <?php echo json_encode($productFind); ?>;
    var product = <?php echo json_encode($product); ?>;
    console.log(productById);
    var vTypeBook = productById.type;
    var vChooseBook = productById.choose;
    for (var bI = 0; bI < product.length; bI++) {
        if (product[bI].type == vTypeBook) {
            $("#scroll-container").append(`
                <div class="col-lg-2 mt-4 book-shadow">
                    <div class="card" style="width: 11rem;">
                    <a href="http://ct275-project.localhost/DetailBook.php?id=${product[bI].Id}"> <img class="card-img-top" src="./image/${product[bI].image}" width="100%" alt="Card image cap"></a>
                        <div class="card-body">

                            <p class="card-text book-name"> ${product[bI].name}</p>
                            <hr>
                            <div class="d-flex">
                                <p class="mr-3 price-book">${product[bI].price} $</p>
                                <p class="mt-2" style="text-decoration: line-through;">20 $</p>
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-star" style="color: yellow"></i>
                                <i class="fas fa-star mx-2" style="color: yellow"></i>
                                <i class="fas fa-star" style="color: yellow"></i>
                                <i class="fas fa-star mx-2" style="color: yellow"></i>
                                <i class="fas fa-star" style="color: yellow"></i>
                            </div>
                        </div>
                    </div>
                </div>
    `)
        }
    }

    for (var bI = 0; bI < product.length; bI++) {
        if (product[bI].choose == vChooseBook || product[bI].choose == 4) {
            $("#book-sugess").append(`
                <div class="col-lg-2 mt-4 book-shadow">
                    <div class="card" style="width: 11rem;">
                    <a href="http://ct275-project.localhost/DetailBook.php?id=${product[bI].Id}"> <img class="card-img-top" src="./image/${product[bI].image}" width="100%" alt="Card image cap"></a>
                        <div class="card-body">

                            <p class="card-text book-name"> ${product[bI].name}</p>
                            <hr>
                            <div class="d-flex">
                                <p class="mr-3 price-book">${product[bI].price} $</p>
                                <p class="mt-2" style="text-decoration: line-through;">20 $</p>
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-star" style="color: yellow"></i>
                                <i class="fas fa-star mx-2" style="color: yellow"></i>
                                <i class="fas fa-star" style="color: yellow"></i>
                                <i class="fas fa-star mx-2" style="color: yellow"></i>
                                <i class="fas fa-star" style="color: yellow"></i>
                            </div>
                        </div>
                    </div>
                </div>
    `)
        }
    }



    $("#btn-add-cart").on("click", function () {
        var productId1 =
            <?php echo json_encode($productId); ?>;
        var userId1 =
            <?php echo json_encode($userId); ?>;
        var gUrl = '/add_to_cart.php?userId=' + userId1;
        $.ajax({
            url: gUrl,
            type: 'POST',
            data: { product_id: productId1 },
            success: function (response) {
                // Xử lý phản hồi từ máy chủ (nếu cần)
                // console.log(response);
                alert("Đã thêm sản phẩm vào giỏ hàng");
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi (nếu có)
                console.error(error);
            }
        });
    })

    function onLoadPro() {
        $.ajax({
            url: "https://provinces.open-api.vn/api/",
            type: "GET",
            success: function (paramRes) {
                handleLoadPro(paramRes);
            },
            error: function (paramErr) {
                alert(paramErr.status);
            }
        })
    }
    function handleLoadPro(paramData) {
        for (var bI = 0; bI < paramData.length; bI++) {
            $("#select-province").append($("<option>", {
                text: paramData[bI].name,
                value: paramData[bI].id
            }))
        }
    }


</script>


</html>