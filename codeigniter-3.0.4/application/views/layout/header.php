<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= 'My App' . ( isset($title) ? ' - ' . $title : '' ) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/Ionicons/css/ionicons.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/core/css/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins, folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/core/css/skins/_all-skins.min.css') ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/morris.js/morris.css') ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/jvectormap/jquery-jvectormap.css') ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/dependencies/bootstrap-daterangepicker/daterangepicker.css') ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte-2.4.5/fonts.css') ?>">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">

    <!-- Main wrapper-->  
    <div class="wrapper">

      <?php
      $HeaderData = array();
      $HeaderData[ 'HeaderData' ] = $HeaderData;
      $this->load->view('layout/header-navigation' );
      $this->load->view('layout/header-menu' );
      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php
        $this->load->view('layout/header-content-title', $HeaderData );
        ?>