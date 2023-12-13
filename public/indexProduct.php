<?php
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';

// use CT275\Labs\Contact;
use CT275\Labs\Paginator;
use CT275\Labs\Product;


// $contact = new Contact($PDO);

$product = new Product($PDO);

// $contacts = $contact->all();
$products = $product->allProduct();
$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ?
    (int) $_GET['limit'] : 5;
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ?
    (int) $_GET['page'] : 1;
$paginator = new Paginator(
    totalRecords: $product->count(),
    recordsPerPage: $limit,
    currentPage: $page
);
$products = $product->paginate($paginator->recordOffset, $paginator->recordsPerPage);
$pages = $paginator->getPages(length: 3);

?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>

    <div class="container">
        <?php
        $subtitle = 'Edit Product';
        include_once __DIR__ . '/../partials/heading.php';
        ?>

        <div class="row">
            <div class="col-12">

                <a href="/AddProduct.php" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Product
                </a>

                <table id="contacts" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tên Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($product->name) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($product->price) ?>
                                </td>
                                <td>
                                    <?= date("d-m-Y", strtotime($product->created_at)) ?>
                                </td>
                                <td>
                                    <img width="30%" src="image/<?= htmlspecialchars($product->image) ?>"
                                        alt="Product Image">
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/EditProduct.php?id=' . $product->Id ?>" class="btn btn-xs btn-warning">
                                        <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                    <form class="form-inline ml-1" action="/deleteProduct.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $product->Id ?>">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-contact">
                                            <i alt="Delete" class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- page nator -->
                <nav class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item<?= $paginator->getPrevPage() ?
                            '' : ' disabled' ?>">
                            <a role="button" href="/indexProduct.php?page=<?= $paginator->getPrevPage() ?>&limit=5"
                                class="page-link">
                                <span>&laquo;</span>
                            </a>
                        </li>
                        <?php foreach ($pages as $page): ?>
                            <li class="page-item<?= $paginator->currentPage === $page ?
                                ' active' : '' ?>">
                                <a role="button" href="/indexProduct.php?page=<?= $page ?>&limit=5" class="page-link">
                                    <?= $page ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                        <li class="page-item<?= $paginator->getNextPage() ?
                            '' : ' disabled' ?>">
                            <a role="button" href="/indexProduct.php?page=<?= $paginator->getNextPage() ?>&limit=5"
                                class="page-link">
                                <span>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div id="delete-confirm" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/../partials/footer.php' ?>
    <!-- <script>
        $(document).ready(function () { });
    </script> -->
    <script>
        $(document).ready(function () {
            $('button[name="delete-contact"]').on('click', function (e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td:first');
                if (nameTd.length > 0) {
                    $('.modal-body').html(
                        `Do you want to delete "${nameTd.text()}"?`
                    );
                }
                $('#delete-confirm').modal({
                    backdrop: 'static', keyboard: false
                })
                    .one('click', '#delete', function () {
                        form.trigger('submit');
                    });
            });
        });
    </script>
</body>

</html>