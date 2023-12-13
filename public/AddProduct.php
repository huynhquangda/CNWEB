<?php
require_once __DIR__ . '/../bootstrap.php';

include_once __DIR__ . '/../partials/header.php';
use CT275\Labs\Product;

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product($PDO);
    $product->fill($_POST);
    if ($product->validate()) {
        $product->addProduct() && redirect('/indexProduct.php');
    }
    $errors = $product->getValidationErrors();
}

?>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>

    <!-- Main Page Content -->
    <div class="container">

        <?php
        // $subtitle = 'Add your contacts here.';
        // include_once __DIR__ . '/../partials/heading.php';
        ?>
        <h1>Thêm sản phẩm</h1>
        <div class="row">

            <div class="col-12">

                <form method="post" class="col-md-6 offset-md-3">

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name"
                            class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255"
                            id="name" placeholder="Enter Name"
                            value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" />

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
                        <label for="phone">Price</label>
                        <input type="text" name="price"
                            class="form-control<?= isset($errors['price']) ? ' is-invalid' : '' ?>" maxlen="255"
                            id="price" placeholder="Enter price"
                            value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>" />

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
                        <label for="notes">image</label>
                        <textarea name="image" id="image"
                            class="form-control<?= isset($errors['image']) ? ' is-invalid' : '' ?>"
                            placeholder="Enter image (maximum character limit: 255)"><?= isset($_POST['image']) ? $_POST['notes'] : '' ?></textarea>

                        <?php if (isset($errors['image'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['image'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label for="email">description </label>
                        <input type="email" name="description" id="description" class="form-control"
                            placeholder="Enter des (maximum character limit)"
                            value="<?= isset($_POST['description']) ? $_POST['description'] : '' ?>">
                    </div>
                    <!-- password -->
                    <div class="form-group">
                        <label for="password">type </label>
                        <input type="text" name="password" id="type" class="form-control"
                            placeholder="Enter type(maximum character limit: 8)"
                            value="<?= isset($_POST['type']) ? $_POST['type'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">choose </label>
                        <input type="text" name="password" id="choose" class="form-control"
                            placeholder="Enter type(maximum character limit: 8)"
                            value="<?= isset($_POST['choose']) ? $_POST['choose'] : '' ?>">
                    </div>

                    <!-- Submit -->
                    <button type="submit" name="submit" class="btn btn-primary form-control">Thêm sản phẩm</button>
                </form>

            </div>
        </div>

    </div>

    <?php include_once __DIR__ . '/../partials/footer.php' ?>
</body>

</html>