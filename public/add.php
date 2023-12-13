<?php
require_once __DIR__ . '/../bootstrap.php';

include_once __DIR__ . '/../partials/header.php';
use CT275\Labs\Contact;

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = new Contact($PDO);
    $contact->fill($_POST);
    if ($contact->validate()) {
        $contact->addContact() && redirect('/');
    }
    $errors = $contact->getValidationErrors();
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
        <h1>Đăng ký người dùng</h1>
        <div class="row">
            <div class="col-4">
                <img src="image/register.png" width="100%" height="500px" alt="">
            </div>
            <div class="col-8">

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
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone"
                            class="form-control<?= isset($errors['phone']) ? ' is-invalid' : '' ?>" maxlen="255"
                            id="phone" placeholder="Enter Phone"
                            value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" />

                        <?php if (isset($errors['phone'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['phone'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <!-- Notes -->
                    <div class="form-group">
                        <label for="notes">Notes </label>
                        <textarea name="notes" id="notes"
                            class="form-control<?= isset($errors['notes']) ? ' is-invalid' : '' ?>"
                            placeholder="Enter notes (maximum character limit: 255)"><?= isset($_POST['notes']) ? $_POST['notes'] : '' ?></textarea>

                        <?php if (isset($errors['notes'])): ?>
                            <span class="invalid-feedback">
                                <strong>
                                    <?= $errors['notes'] ?>
                                </strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Enter email (maximum character limit)"
                            value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    </div>
                    <!-- password -->
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter password (maximum character limit: 8)"
                            value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                    </div>

                    <!-- Submit -->
                    <button type="submit" name="submit" class="btn btn-primary form-control">Đăng ký</button>
                </form>

            </div>
        </div>

    </div>

    <?php include_once __DIR__ . '/../partials/footer.php' ?>
</body>

</html>