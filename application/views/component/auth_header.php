<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="GIS Perumda Air Minum Gapura Tirta Rahayu Purwakarta">
  <meta name="author" content="Bayu BP">
  <meta content='#1a237e ' name='theme-color' />
  <meta content='#1a237e ' name='apple-mobile-web-app-status-bar-style' />
  <meta content='#1a237e ' name='msapplication-navbutton-color' />
  <meta name="mobile-web-app-capable" content="yes">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="msapplication-tap-highlight" content="no">

  <title><?= $title; ?></title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?= base_url(); ?>assets/images/logo/ico.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('') ?>assets/images/logo/ico.png">


  <!-- BEGIN: VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/vendors/flag-icon/css/flag-icon.min.css">
  <!-- END: VENDOR CSS-->
  <!-- BEGIN: Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/themes/vertical-dark-menu-template/materialize.min.css">
  <!-- END: Page Level CSS-->
  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('') ?>assets/css/custom/custom.css">


  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
  <style>
    #map {
      width: 960px;
      height: 500px;
    }
  </style>


</head>

<body class="blue darken-4">