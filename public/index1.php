<?php
require_once __DIR__ . '/../bootstrap.php';
use CT275\Labs\Contact;

include_once __DIR__ . '/../partials/header.php';
?>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>


    <!-- Main Page Content -->
    <div class="container">

        <?php
        $subtitle = 'View your all contacs here.';
        include_once __DIR__ . '/../partials/heading.php';
        ?>

        <div class="row">
            <div class="col-12">

                <a href="/add.php" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Contact
                </a>

                <!-- Table Starts Here -->
                <table id="contacts" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <!-- Table Ends Here -->

                <!-- Pagination -->
                <nav class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a role="button" class="page-link">
                                <span>&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a role="button" class="page-link">1</a>
                        </li>
                        <li class="page-item active">
                            <a role="button" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a role="button" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a role="button" class="page-link">
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
                <div class="modal-body">Do you want to delete this contact?</div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <?php include_once __DIR__ . '/../partials/footer.php' ?>
    <script>
        $(document).ready(function () { });
    </script>

</body>

</html>