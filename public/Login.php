<?php
require_once __DIR__ . '/../bootstrap.php';
include_once __DIR__ . '/../partials/header.php';


use CT275\Labs\Contact;


$contact = new Contact($PDO);

$contactAll = $contact->all();


?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php include_once __DIR__ . '/../partials/navbar.php' ?>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="inp-email" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="inp-password" class="form-control form-control-lg"
                                placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button id="btn-login" type="button" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                    href="http://ct275-project.localhost/add.php" class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
    <?php include_once __DIR__ . '/../partials/footer.php' ?>

</body>
<script>
    var contacts = <?php echo json_encode($contactAll) ?>;
    console.log(contacts);
    $("#btn-login").on("click", function () {

        var vEmail = $("#inp-email").val();
        var vPassword = $("#inp-password").val();
        console.log(vEmail);
        console.log(vPassword);
        var vCheck = validateLogin(vEmail, vPassword)
        if (vCheck) {
            for (var bI = 0; bI < contacts.length; bI++) {
                if (vEmail == contacts[bI].email && vPassword == contacts[bI].password) {
                    alert("Đăng nhập thành công!");

                    var id = contacts[bI].Id;
                    window.location.href = "http://ct275-project.localhost/Home.php?idUser=" + id;


                }
                else {
                    // alert("password hoặc email không chính xác");
                }
            }
        }
        else {
            alert("Nhập đúng và đủ các trường!")
        }
    })

    function validateLogin(email, pass) {
        if (validateEmail(email) == false || email == "" || pass == "") {
            return false;
        }
        return true;

    }
    function validateEmail(Pemail) {
        var re = /\S+@\S+\.\S+/;
        return re.test(Pemail);
    }



</script>

</html>