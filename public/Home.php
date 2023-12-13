<?php
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';


use CT275\Labs\Product;


$product = new Product($PDO);
$productId = 1;
$productFind = $product->findProduct($productId);
$product = $product->allProduct();
$userId = $_GET['idUser'];

// echo $userId;


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .content {
            margin: 10px 50px;
        }

        .home {
            background-color: #F1F1F1;
            margin-bottom: 100px;
        }

        .type-book {
            /* padding: 0; */
            /* box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px; */
        }

        .img-type-book {
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
        }

        .text1-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 83px;
        }

        .text2-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 23px;
        }

        .text3-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 33px;
        }

        .text4-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 12px;
        }

        .text5-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 76px;
        }

        .text6-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 62px;
        }

        .text7-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 91px;
        }

        .text8-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 33px;
        }

        .text9-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 91px;
        }



        .text10-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 46px;
        }

        .text11-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 66px;
        }

        .text12-type-book {
            position: absolute;
            top: 70px;
            color: #ffff;
            font-weight: 500;
            font-size: 21px;
            background-color: rgba(123, 123, 123, 0.5);
            padding: 10px 51px;
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


        /* .book-shadow {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        } */
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>
    <?php
    $subtitle = 'View your all contacs here.';

    ?>

    <div class="home">
        <!-- caroasel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-mdb-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/caro1.png" class="d-block w-100" alt="Wild Landscape" />
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="d-block w-100" alt="Camera" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="d-block w-100"
                        alt="Exotic Fruits" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCaptions"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCaptions"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--  -->
        <!--  -->
        <div class="content">
            <img src="./image/" alt="">
            <!-- browse genres -->
            <h3 class="mb-4">BROWSER GENRES</h3>
            <div class="row">
                <div class="col-lg-3 type-book">
                    <img class="img-type-book" src="/image/romance1.jpg" width="100%" alt="">
                    <p class="text1-type-book">ROMANCE</p>
                </div>
                <div class="col-lg-3">
                    <img class="img-type-book" src="/image/action.jpg" width="100%" alt="">
                    <p class="text2-type-book">ACTION & ADVENTURE</p>
                </div>
                <div class="col-lg-3">
                    <img class="img-type-book" src="/image/mysteri.jpg" width="100%" alt="">
                    <p class="text3-type-book">MISTERY & THRILLER</p>
                </div>
                <div class="col-lg-3">
                    <img class="img-type-book" src="/image/history.jpg" width="100%" alt="">
                    <p class="text4-type-book">BIOGRAPHIES & HISTORY</p>
                </div>
                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/children.jpg" width="100%" alt="">
                    <p class="text5-type-book">CHILDREN'S</p>
                </div>

                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/young.jpg" width="100%" alt="">
                    <p class="text6-type-book">YOUNG ADULT</p>
                </div>
                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/fantasy.jpg" width="100%" alt="">
                    <p class="text7-type-book">FANTASY</p>
                </div>
                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/fiction.jpg" width="100%" alt="">
                    <p class="text8-type-book">HISTORICAL FICTION</p>
                </div>
                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/horrow.jpg" width="100%" alt="">
                    <p class="text9-type-book">HORROR</p>
                </div>
                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/Literary.jpg" width="100%" alt="">
                    <p class="text10-type-book">LITERARY FICTION</p>
                </div>
                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/nonfic.jpg" width="100%" alt="">
                    <p class="text11-type-book">NON-FICTION</p>
                </div>
                <div class="col-lg-3 mt-5">
                    <img class="img-type-book" src="/image/scien.jpg" width="100%" alt="">
                    <p class="text12-type-book">SCIENCE FICTION</p>
                </div>



            </div>
            <h3 class="my-5">TODAY'S FREE EBOOKS AND DEALS</h3>
            <div id="book-free" class="row">

            </div>

            <!--  -->
            <h3 class="my-5">POPULAR CLASSICS</h3>
            <div id="book-popular" class="row">

            </div>
            <!-- Trending -->
            <h3 class="my-5">TRENDING BOOKS </h3>

            <div id="book-trending" class="row">

            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/../partials/footer.php' ?>

</body>
<script>
    var product = <?php echo json_encode($product); ?>;
    console.log(product);
    console.log(product.length);
    console.log(product[2].name);
    var productById = <?php echo json_encode($productFind); ?>;
    console.log(productById);
    var vUserId = <?php echo json_encode($userId); ?>;
    localStorage.setItem('uId', vUserId);


    for (var bI = 0; bI < product.length; bI++) {
        if (product[bI].choose == 1 || product[bI].choose == 4 || product[bI].choose == 5 || product[bI].choose == 6) {
            $("#book-free").append(`
           
                    <div class="col-lg-2 mt-4 book-shadow">
                        <div class="card" style="width: 11rem;">
                        <a href="http://ct275-project.localhost/DetailBook.php?id=${product[bI].Id}&idUser=${vUserId}"> <img class="card-img-top" src="./image/${product[bI].image}" width="100%" alt="Card image cap"></a>
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
        if (product[bI].choose == 2 || product[bI].choose == 4 || product[bI].choose == 5 || product[bI].choose == 7) {
            $("#book-popular").append(`
           
                    <div class="col-lg-2 mt-4 book-shadow">
                        <div class="card" style="width: 11rem;">
                            <img class="card-img-top" src="./image/${product[bI].image}" width="100%" alt="Card image cap">
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
        if (product[bI].choose == 3 || product[bI].choose == 4 || product[bI].choose == 6 || product[bI].choose == 7) {
            $("#book-trending").append(`
           
                    <div class="col-lg-2 mt-4 book-shadow">
                        <div class="card" style="width: 11rem;">
                            <img class="card-img-top" src="./image/${product[bI].image}" width="100%" alt="Card image cap">
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

    // 



</script>

</html>