<?php
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';


use CT275\Labs\Product;
use CT275\Labs\Cart;

// use CT275\Labs\Product;


$product = new Product($PDO);
$productId = 1;
// $productFind = $product->findProduct($productId);
$product = $product->allProduct();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .allpro {
            margin: 10px 50px;
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>


    <div class="allpro">
        <div class="row">
            <div class="col-4">
                <select name="" id="choose-filter" class="form-control">
                    <option id="ro" value="1">Romance</option>
                    <option id="ac" value="2">Action</option>
                    <option id="my" value="3">Mysteri</option>
                </select>
            </div>
            <div class="col-8">
                <div id="book-all" class="row">

                </div>
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
    for (var bI = 0; bI < product.length; bI++) {

        $("#book-all").append(`
           
                    <div class="col-lg-3 mt-4 book-shadow">
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
    if ("#ro").on("click", function () {
        $("#book-all").html("");
        for (var bI = 0; bI < product.length; bI++) {

$("#book-all").append(`
            if()
            <div class="col-lg-3 mt-4 book-shadow">
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
    

    })
</script>

</html>