<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title> Dashboard</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('Asset/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('Asset/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('Asset/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('Asset/vendors/iCheck/skins/flat/green.css')?>" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('Asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('Asset/vendors/jqvmap/dist/jqvmap.min.css')?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('Asset/vendors/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('Asset/build/css/custom.min.css')?>" rel="stylesheet">
    <style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  .container.body {
    flex: 1;
    display: flex;
  }

  .main_container {
    flex: 1;
    display: flex;
  }

  .left_col {
    width: 230px; /* Lebar sidebar */
    min-height: 100vh;
    background: #2A3F54; /* Warna sidebar */
    color: #FFF; /* Warna teks sidebar */
    padding-top: 10px;
  }

  .right_col {
    flex: 1;
    min-height: 100vh;
    padding: 10px;
  }

  .nav-sm .right_col {
    margin-left: 70px; /* Lebar sidebar dalam mode responsif */
    
  }
  .nav_menu {
  width: 100%; /* Menyesuaikan lebar dengan right_col */
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>