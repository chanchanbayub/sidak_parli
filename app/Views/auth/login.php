<?php

use CodeIgniter\Filters\CSRF;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/sidak_parli2.png" rel="icon">
    <link href="/assets/img/sidak_parli2.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.min.css">


    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="/auth/login" class="logo d-flex align-items-center w-auto">
                                    <!-- <img src="/assets/img/logo2.png" alt=""> -->
                                    <span class="d-none d-lg-block"><?= $title ?></span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Silahkan Login </h5>
                                        <p class="text-center small">Masukan Username & Password Anda</p>
                                    </div>

                                    <form class="row g-3 " autocomplete="off" id="login_form">
                                        <?= csrf_field(); ?>
                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="username" placeholder="masukan username">
                                                <div class="invalid-feedback error-username">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="masukan password">
                                            <div class="invalid-feedback error-password">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Ingat Saya ?</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" id="login">
                                                Login
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Tidak Punya Akun ? <a href="#">Hubungi Admin !</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="<?= base_url('/') ?>">SIDAK PARLI</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <!-- <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="/assets/vendor/chart.js/chart.umd.js"></script> -->
    <!-- <script src="/assets/vendor/echarts/echarts.min.js"></script> -->
    <!-- <script src="/assets/vendor/quill/quill.min.js"></script> -->
    <!-- <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script> -->
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.min.js"></script>
    <!-- <script src="/assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>


    <script src="/assets/vendor/jquery/jquery.js"></script>

    <script>
        $("#login_form").submit(function(e) {
            e.preventDefault();
            let username = $("#username").val();
            let password = $("#password").val();

            $.ajax({
                url: '/auth/check_login',
                method: 'post',
                dataType: 'JSON',
                data: {
                    username: username,
                    password: password
                },
                beforeSend: function() {
                    $('#login').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('#login').prop('disabled', true);
                },
                success: function(response) {
                    $('#login').html('Login');
                    $('#login').prop('disabled', false);
                    if (response.error) {
                        // console.log(response)
                        if (response.error.username) {
                            $("#username").addClass('is-invalid');
                            $(".error-username").html(response.error.username);
                        } else {
                            $("#username").removeClass('is-invalid');
                            $(".error-username").html('');
                        }
                        if (response.error.password) {
                            $("#password").addClass('is-invalid');
                            $(".error-password").html(response.error.password);
                        } else {
                            $("#password").removeClass('is-invalid');
                            $(".error-password").html('');
                        }
                    } else if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: `${response.success}`,
                        });
                        setTimeout(function() {
                            window.location.replace(`${response.url}`);
                        }, 2000);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: `${response.errors}`,
                        });
                        $('#login').prop('disabled', false);
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Gagal Diproses`,
                    });
                    $('#login').prop('disabled', false);
                    $('#login').html('Login');
                }
            });
        });
    </script>

</body>

</html>