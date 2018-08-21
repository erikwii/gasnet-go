<!DOCTYPE html>
<html lang="en">
<!-- HAYO MAU NGAPAIN NGINTIP-NGINTIP ?? ^^, -->
<!-- BELAJAR YANG RAJIN YA !! -->
<!-- #MayTheCodeBuiltinYou -->
<!-- <> with ❤ by Erik si anak magang-->
<!-- ga usah bilang-bilang abis liat ini ^^, -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/gasnet.png')?>"/>
	<title><?php echo $title ?></title>
    <meta name="description" content="Sistem informasi permohonan kendaraan operasional Gasnet PGASCOM">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/clockpicker.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker.css">

    <!-- development version, includes helpful console warnings -->
    <script src="<?php echo base_url()?>assets/js/polyfill.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    
    <!-- DataTables plugin start -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.bootstrap.js"></script>
    <!-- DataTables plugin end -->
    
    <!-- Other lugin start -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/clockpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datepicker.id.min.js"></script>
    <!-- Other plugin end -->

    <style>
        #loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 48px;
            height: 48px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            display: none;
            position: relative;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .checkbox-rounded [type="checkbox"][class*='filled-in']+label:after {
            border-radius: 50%;
        }

        .app {
            margin-top: 70px;
            margin-bottom: 80px;
        }

        .form-app {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .login {
            margin-top: 100px !important;
        }
    </style>
</head>

<body>