<?php
require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../src/Contact.php';

use CT275\Labs\Product;

$product = new Product($PDO);
$id = isset($_REQUEST['id']) ?
    filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
if ($id < 0 || !($product->findProduct($id))) {
    redirect('/indexProduct.php');
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($product->update($_POST)) {
        // Cập nhật dữ liệu thành công
        redirect('/indexProduct.php');
    }
    // Cập nhật dữ liệu không thành công
    $errors = $product->getValidationErrors();
}

include_once __DIR__ . '/../partials/header.php';
?>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>

    <!-- Main Page Content -->
    <div class="container">

        <?php
        $subtitle = 'Update your Product here.';
        include_once __DIR__ . '/../partials/heading.php';
        ?>

        <div class="row">
            <div class="col-12">

                <form method="post" class="col-md-6 offset-md-3">

                    <input type="hidden" name="id" value="<?= $product->Id ?>">

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name"
                            class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255"
                            id="name" placeholder="Enter Name" value="<?= $product->name ?>" />

                        <?php if (isset($errors['name'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['name'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" name="price" class="form-control" maxlen="255" id="price"
                            placeholder="Enter price" value="<?= $product->price ?>" />

                        <?php if (isset($errors['price'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['price'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <!-- Notes -->
                    <div class="form-group">
                        <label for="image">image </label>
                        <textarea name="image" id="image" class="form-control"
                            placeholder="Enter image (maximum character limit: 255)"><?= $product->image ?></textarea>

                        <?php if (isset($errors['image'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['image'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea name="description" id="description"
                            class="form-control<?= isset($errors['description']) ? ' is-invalid' : '' ?>"
                            placeholder="Enter des (maximum character limit: 255)"><?= $product->description ?></textarea>

                        <?php if (isset($errors['description'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['description'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="type">type </label>
                        <textarea name="type" id="type" class="form-control"
                            placeholder="Enter des (maximum character limit: 255)"><?= $product->type ?></textarea>

                        <?php if (isset($errors['type'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['type'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="choose">Choose </label>
                        <textarea name="choose" id="choose" class="form-control"
                            placeholder="Enter des (maximum character limit: 255)"><?= $product->choose ?></textarea>

                        <?php if (isset($errors['choose'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['choose'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <!-- Submit -->
                    <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
                </form>

            </div>
        </div>

    </div>

    <?php include_once __DIR__ . '/../partials/footer.php' ?>
</body>

</html>