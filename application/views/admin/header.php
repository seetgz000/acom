<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>js/notify.min.js"></script>
        <script src="<?= base_url() ?>js/bootstrapValidator.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/skins/_all-skins.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/js/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/admin_style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/admin.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/bootstrapValidator.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery-ui.structure.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery-ui.theme.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery.loadingModal.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery.loadingModal.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery.jOrgChart.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <link rel="stylesheet" href="<?php echo site_url(); ?>/css/datepicker3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">


    </head>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a class="logo">
                    <span class="logo-mini"><b>A</b>com</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>ACOM</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <ul class="nav navbar-nav pull-right">
                    </ul>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
<!--                    <div class="user-panel">
                        <div class="pull-left image">

                        </div>
                        <div class="pull-left info">
                            <p><?= $this->session->userdata['username'] ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>-->
                    <!-- search form -->
<!--                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>-->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="<?= base_url()?>admin">
                                <i class="fa fa-coffee"></i> <span>Admins</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>user">
                                <i class="fa fa-users"></i> <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>product">
                                <i class="fa fa-archive"></i> <span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>category">
                                <i class="fa fa-folder-open"></i> <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>label">
                                <i class="fa fa-image"></i> <span>Label</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>collection">
                                <i class="fa fa-object-group"></i> <span>Collection</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>promotion">
                                <i class="fa fa-money"></i> <span>Promotion</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>indexPage">
                                <i class="fa fa-image"></i> <span>Index Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>termAndCondition">
                                <i class="fa fa-image"></i> <span>Terms And Conditions</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>shippingDetails">
                                <i class="fa fa-ship"></i> <span>Shipping Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>order">
                                <i class="fa fa-truck"></i> <span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>access/logout">
                                <i class="fa fa-sign-out"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">
                
