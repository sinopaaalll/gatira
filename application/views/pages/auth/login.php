<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-dark-menu-template/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 May 2020 08:24:57 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title><?= $title?></title>
    <link rel="apple-touch-icon" href="<?= base_url('')?>assets/images/logo/ico.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('')?>assets/images/logo/ico.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('')?>assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('')?>assets/css/themes/vertical-dark-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('')?>assets/css/themes/vertical-dark-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('')?>assets/css/pages/login.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('')?>assets/css/custom/custom.css">
    <!-- END: Custom CSS-->

    <style>
        .login-bg {
            background-image: url("<?=base_url('assets')?>/images/gallery/slider7.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .login-img {
            width: 200px;
        }
    </style>
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                    <form class="login-form" action="<?= base_url('auth/login') ?>" method="post">
                        <div class="row">
                            <div class="input-field col s12 center">
                                <a href="<?= base_url('dashboard')?>">
                                    <img src="<?= base_url('assets')?>/images/logo/logo_gatira1.png" alt="Gatira" class="login-img">
                                </a>
                                <h5 class="ml-4">HALAMAN MASUK</h5>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nik" type="number" name="nik" class="<?= form_error('nik') ? 'validate invalid' : ''?>" value="<?= set_value('nik')?>"  autofocus>
                            <label for="nik" class="center-align">NIK</label>
                            <?php echo form_error('nik', '<span class="helper-text red-text">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="password" type="password" name="password" class="<?= form_error('password') ? 'validate invalid' : ''?>">
                            <label for="password">Password</label>
                            <?php echo form_error('password', '<span class="helper-text red-text" >', '</span>'); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 ml-2 mt-1">
                                <p>
                                    <label>
                                        <input type="checkbox" id="show" />
                                        <span>Lihat Password</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                            <button class="btn waves-effect waves-light border-round blue darken-4 col s12">Login</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a href="<?= base_url('auth/registrasi'); ?>">Register Now!</a></p>
                            </div>
                            <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password ?</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.min.js"></script>

    <script src="<?= base_url('')?>assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?= base_url('')?>assets/js/plugins.min.js"></script>
    <script src="<?= base_url('')?>assets/js/search.min.js"></script>
    <script src="<?= base_url('')?>assets/js/custom/custom-script.min.js"></script>

    <script>
        $(document).ready(function() {
            // Tangkap elemen checkbox
            var showPasswordCheckbox = $("#show");

            // Tangkap elemen input password
            var passwordInput = $("#password");

            // Saat kotak centang berubah
            showPasswordCheckbox.change(function() {
                if (showPasswordCheckbox.is(":checked")) {
                    // Jika dicentang, ubah tipe input menjadi teks
                    passwordInput.attr("type", "text");
                } else {
                    // Jika tidak dicentang, kembalikan tipe input menjadi password
                    passwordInput.attr("type", "password");
                }
            });
        });
    </script>

    <?php
    if ($this->session->flashdata('success')) { ?>
       <script>
            var successMessage = <?php echo json_encode($this->session->flashdata('success')); ?>;
            $(document).ready(function() {
                swal("Good Job!", successMessage, "success");
            });
        </script>
    <?php } else if ($this->session->flashdata('warning')) { ?>
        <script>
            var warningMessage = <?php echo json_encode($this->session->flashdata('warning')); ?>;
            $(document).ready(function() {

                swal("Oops!", warningMessage, "warning");
            });
        </script>
    <?php } else if ($this->session->flashdata('error')) { ?>
        <script>
            var errorMessage = <?php echo json_encode($this->session->flashdata('error')); ?>;
            $(document).ready(function() {

                swal("Oops!", errorMessage, "error");
            });
        </script>
    <?php } ?>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>

</html>