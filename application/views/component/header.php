<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

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
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/sweetalert/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/flag-icon/css/flag-icon.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/data-tables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/data-tables/css/select.dataTables.min.css">
  <!-- END: VENDOR CSS-->
  <!-- BEGIN: Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/themes/vertical-dark-menu-template/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/themes/vertical-dark-menu-template/style.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/pages/data-tables.min.css">
  <!-- END: Page Level CSS-->
  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/custom/custom.css">
  <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
      <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
        <div class="nav-wrapper">

          <ul class="navbar-list right">
            <li><a href=""><?= $this->session->userdata('nama') ?></a></li>
            <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="<?= base_url('assets/images/user/' . $this->session->userdata('image')) ?>" alt="avatar"><i></i></span></a></li>
          </ul>
          <!-- profile-dropdown-->
          <ul class="dropdown-content" id="profile-dropdown">
            <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
            <li><a class="grey-text text-darken-1" href="page-faq.html"><i class="material-icons">help_outline</i> Help</a></li>
            <li>
              <a class="grey-text text-darken-1 logout-link" href="<?= base_url('auth/logout') ?>"><i class="material-icons">keyboard_tab</i> Logout</a>
            </li>
          </ul>
        </div>
        <nav class="display-none search-sm">
          <div class="nav-wrapper">
            <form id="navbarForm">
              <div class="input-field search-input-sm">
                <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                <ul class="search-list collection search-list-sm display-none"></ul>
              </div>
            </form>
          </div>
        </nav>
      </nav>
    </div>
  </header>
  <!-- END: Header-->