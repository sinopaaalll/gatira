<!DOCTYPE html>
<!--
Template Name: Materialize - Material Design Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
Renew Support: https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-dark-menu-template/user-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 May 2020 08:25:01 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
  <meta name="author" content="ThemeSelect">
  <title><?= $title ?></title>
  <link rel="apple-touch-icon" href="<?= base_url('') ?>assets/images/logo/ico.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('') ?>assets/images/logo/ico.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- BEGIN: VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/vendors.min.css">
  <!-- END: VENDOR CSS-->
  <!-- BEGIN: Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/themes/vertical-dark-menu-template/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/themes/vertical-dark-menu-template/style.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/pages/register.min.css">
  <!-- END: Page Level CSS-->
  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/custom/custom.css">
  <!-- END: Custom CSS-->

  <style>
    .register-bg {
      background-image: url("<?= base_url('assets') ?>/images/gallery/slider7.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    .register-img {
      width: 200px;
    }
  </style>
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 1-column register-bg   blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
  <div class="row">
    <div class="col s12">
      <div class="container">
        <div id="register-page" class="row">
          <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
            <form class="login-form" action="<?= base_url('auth/registrasi') ?>" method="post">
              <div class="row">
                <div class="input-field col s12 center">
                  <a href="<?= base_url('dashboard') ?>">
                    <img src="<?= base_url('assets') ?>/images/logo/logo_gatira1.png" alt="Gatira" class="register-img">
                  </a>
                  <h5 class="ml-2">HALAMAN REGISTRASI</h5>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix">assignment_ind</i>
                  <input id="nik" type="number" name="nik" value="<?= set_value('nik') ?>">
                  <label for="nik" class="center-align">NIK</label>
                  <?php echo form_error('nik', '<span class="helper-text red-text" >', '</span>'); ?>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="nama" type="text" name="nama" value="<?= set_value('nama') ?>">
                  <label for="nama" class="center-align">Nama Lengap</label>
                  <?php echo form_error('nama', '<span class="helper-text red-text" >', '</span>'); ?>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix">mail_outline</i>
                  <input id="email" type="email" name="email" value="<?= set_value('email') ?>">
                  <label for="email" class="center-align">Email</label>
                  <?php echo form_error('email', '<span class="helper-text red-text" >', '</span>'); ?>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="password" type="password" name="password">
                  <label for="password">Password</label>
                  <?php echo form_error('password', '<span class="helper-text red-text" >', '</span>'); ?>

                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="pass_conf" type="password" name="pass_conf">
                  <label for="pass_conf">Konfirmasi Password</label>
                  <?php echo form_error('pass_conf', '<span class="helper-text red-text" >', '</span>'); ?>

                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix">tag</i>
                  <div class="select-wrapper">
                    <select name="role" id="role">
                      <option value="0" selected disabled>PILIH BAGIAN</option>
                      <?php foreach ($role as $data) { ?>
                        <option value="<?= $data->id ?>" <?= set_value('role') == $data->id ? "selected" : "" ?>><?= $data->nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <label for="role">Bagian</label>
                  <?php echo form_error('role', '<span class="helper-text red-text" >', '</span>'); ?>

                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <button type="submit" class="btn waves-effect waves-light border-round blue darken-4 col s12">Register</button>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <p class="margin medium-small"><a href="<?= base_url('auth/login') ?>">Already have an account? Login</a></p>
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
  <script src="<?= base_url('') ?>assets/js/vendors.min.js"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN THEME  JS-->
  <script src="<?= base_url('') ?>assets/js/plugins.min.js"></script>
  <script src="<?= base_url('') ?>assets/js/search.min.js"></script>
  <script src="<?= base_url('') ?>assets/js/custom/custom-script.min.js"></script>
  <!-- END THEME  JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-dark-menu-template/user-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 May 2020 08:25:01 GMT -->

</html>