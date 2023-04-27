<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Rental Mobil ITSolution</title>

    <!--=== Bootstrap CSS ===-->
    <link href="<?= base_url(); ?>assets/assets_shop/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="<?= base_url() ?>assets/assets_shop/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="<?= base_url(); ?>assets/assets_shop/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4 row">
                        <a href="<?= base_url('customer/Dashboard'); ?>" class="logo">
                            <img class="" style="width: 80px;" src="<?= base_url(); ?>assets/assets_shop/img/High_Resolution_Logo_ITS.svg" alt="JSOFT">

                        </a>
                        <div class="mt-4 ml-3" style="color: green; font-size: 20px; font-family: Arial, Helvetica, sans-serif;">Rental Mobil ITSolution</div>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class=""><a href="<?= base_url('customer/Dashboard'); ?>">Beranda</a></li>
                                <li><a href="<?= base_url('customer/DataMobil'); ?>">Mobil</a></li>
                                <li><a href="<?= base_url('customer/Transaksi'); ?>">Transaksi</a></li>
                                <li><a href="<?php echo base_url('Register') ?>" target="_blank">Register</a></li>
                                <?php if ($this->session->userdata('nama')) { ?>
                                    <li><a onclick="return confirm('Yakin Logout?')" href="<?= base_url('Auth/logout'); ?>">Welcome&nbsp;<?= $this->session->userdata('nama'); ?><span>&nbsp;|&nbsp;Logout</span></a></li>

                                    <!-- <li><a href="<?php echo base_url('Customer/About') ?>">About</a></li> -->

                                <?php } else { ?>
                                    <li><a href="<?= base_url('Auth/login') ?>">Login</a></li>

                                    <!-- <li><a href="<?php echo base_url('Customer/About') ?>">About</a></li> -->

                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->