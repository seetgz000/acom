<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shop Cherie</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="https://devitems.com/html/raptas-preview/raptas/img/favicon.png" />
        <!-- Place favicon.ico in the root directory -->
        <!-- all css here -->
        <!-- Bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/bootstrap.min.css">
        <!-- Animate css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/animate.css">
        <!-- jQuery-ui.min css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/jquery-ui.min.css">
        <!-- Owl carousel css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/owl.carousel.css">
        <!-- Font-awesome css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/font-awesome.min.css">
        <!-- Material design iconic css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/material-design-iconic-font.min.css">
        <!-- Nivo Slider css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/nivo-slider.css" />
        <!--Slider css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/slider.css" />
        <!-- Default css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/default.css">
        <!-- Mean menu css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/meanmenu.css">
        <!-- Main style css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/style.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="<?= site_url(); ?>css/responsive.css">
        <!-- modernizr css -->
        <script src="<?= site_url(); ?>js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

        <div class="hp3-full-wrapper">
            <div class="header-area home3-header-area">
                <div class="header-topbar-area-top topbar-area-top2 topbar3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-sm-8 col-xs-12">
                                <div class="header-login posr">
                                    <ul>
                                        <?php if ($this->session->has_userdata("user")) { ?>
                                            <li><a href="<?= site_url("main/profile/" . $user_id ); ?>" style="cursor:pointer;">My Account</a>
                                            </li>
                                        <?php } ?>

                                        <li><a href="<?= site_url("main/cart"); ?>">Checkout</a>
                                        </li>
                                        <?php
                                        if ($this->session->has_userdata('user_id')) {
                                            $user_id = $this->session->userdata('user_id');

                                        ?>
                                            <li><a href="<?= site_url("main/profile/" . $user_id ); ?>" style="cursor:pointer;">Profile</a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li><a data-toggle="modal" data-target="#login-modal" style="cursor:pointer;">Login</a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">

                            </div>
                        </div>
                    </div>
                </div>

                <!--header main menu start-->

                <div id="sticky-header" class="main-menu-wrapper sticky-style2 hp3-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <div class="header-logo home2-header-logo header-logo-def">
                                    <a href="<?= site_url("Main"); ?>"><img src="<?= site_url(); ?>images/logo.png" alt="shopcherie" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 hidden-xs">
                                <nav>
                                    <ul class="main-menu">
                                        <li class="<?php  if ($this->router->fetch_method() == 'index'){ echo 'active' ;} ?>"><a href="<?= site_url("Main"); ?>">Home</a>

                                        </li>
                                        <li class="mega-parent <?php  if ($this->router->fetch_method() == 'products'){ echo 'active' ;} ?>"><a href="#">Shop <i class="zmdi zmdi-chevron-down"></i></a>
                                            <div class="mega-menu-area hp1-style1">
                                                <?php foreach ($category as $row) { ?>
                                                    <ul class="single-mega-item mega-underline1 mega-underline3">
                                                        <li class="mega-title"><a href="#"><?= $row['name']; ?></a>
                                                        </li>
                                                        <?php foreach ($row['child'] as $child) { ?>
                                                            <li><a href="<?= site_url("Main/products/") . $child['category_id']; ?>"><?= $child['name']; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>

                                            </div>

                                        </li>
                                        
                                        <li class="<?php  if ($this->router->fetch_method() == 'new_arrival'){ echo 'active' ;} ?>"><a href="<?= site_url("Main/new_arrival"); ?>">New Arrival</a>
                                        </li>
                                        <li class="<?php  if ($this->router->fetch_method() == 'sales'){ echo 'active' ;} ?>"><a href="<?= site_url("Main/sales"); ?>">Sales</a>
                                        </li>

                                        <li class="mega-parent <?php  if ($this->router->fetch_method() == 'collection'){ echo 'active' ;} ?>"><a href="#">Collection <i class="zmdi zmdi-chevron-down"></i></a>
                                            <div class="mega-menu-area hp1-style1">
                                                <ul>
                                                    <?php foreach ($collection as $row) { ?>
                                                        <li class="mega-title">
                                                            <a class="collection_nav" href="<?= site_url("Main/collection/") . $row['collection_id']; ?>">
                                                                <?= $row['collection_name']; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>

                                            </div>
                                        </li>

                                        <li class="<?php  if ($this->router->fetch_method() == 'contact'){ echo 'active' ;} ?>"><a href="<?= site_url("Main/contact"); ?>">Contact us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <div class="main-cart-area home2-main-cart posr">
                                    <div class="header-search header-search-style2 header-search-position hps2 hps3 posr">
                                        <form action="<?= base_url() ?>main/search">
                                            <input type="text" value="" placeholder="Search Product..." />
                                            <button type="submit"><i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="main-cart-area home2-cart-wrap posr cart-hover-effect">
                                        <div class="shop-bag home2-shopbag home3-shopbag">
                                            <div class="cartpoint-shopping-bag">
                                                <i class="fa fa-shopping-bag"></i>
                                            </div>
                                            <div class="cartpoint-shopping-qty">
                                                <span><?= ($this->session->has_userdata("cart"))? count($this->session->userdata("cart")) : 0 ?></span>
                                            </div>
                                        </div>
                                        <!-- Cart box start-->
                                        <div class="header-cart-box-wrapper cart-position-style2">
                                            <?php $cart_total = 0; ?>
                                            <?php
                                            if ($this->session->has_userdata("cart")) {
                                                foreach ($this->session->userdata("cart") as $row) {
                                                    ?>
                                                    <div class="single-cart-box">
                                                        <div class="cart-image">
                                                            <a href="<?= site_url() ?>main/product/<?= $row["product_id"] ?>"><img src="<?= site_url() . $row["thumbnail"] ?>" alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="cart-content">

                                                            <div class="cart-heading">
                                                                <a href="<?= base_url() ?>main/product/<?= $row["product_id"] ?>>"> <span class="cart-qty"><?= $row["quantity"] ?> x</span> <?= $row["product_name"] ?></a>
                                                            </div>
                                                            <div class="cart-dress-color"><span><?= $row["model"] ?></span>
                                                            </div>
                                                            <div class="cart-price">RM<?= number_format($row["price"], 2) ?></div>
                                                        </div>
                                                        <div class="cart-remove deft-remove-icon">
                                                            <a href="#" class="delete-cart-item-button" data-product="<?= $row["product_id"] ?>" data-model="<?= $row["model_id"] ?>"><i class="zmdi zmdi-close"></i></a>
                                                        </div>
                                                        <!-- <div class="cart-shipping-cost">
                                                            <span class="shipping-text">Shipping</span>
                                                            <span class="shipping-amt">$7.00</span>
                                                        </div> -->
                                                    </div>
                                                    <?php
                                                    $cart_total += $row["total"];
                                                }
                                            }
                                            ?>

                                            <div class="cart-subtotal">
                                                <span class="subttl-text">Subtotal</span>
                                                <span class="subttl-amt">
                                                    <?= number_format($cart_total, 2); ?>
                                                </span>
                                            </div>

                                            <div class="cart-checkout-btn btn-def-checkout">
                                                <a href="<?= site_url("main/cart"); ?>">Checkout <i class="checkout-dir-icon zmdi zmdi-chevron-right "></i></a>
                                            </div>
                                        </div>

                                        <!-- Cart box end-->
                                    </div>
                                    <div class="header_login_wrapper">
                                    <?php
                                    if ($this->session->has_userdata('user_id')) {
                                    ?>
                                        <a href="<?= site_url("main/logout"); ?>" class="btn_logout" title="logout">
                                            <i class="fa fa-sign-out"></i>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <a data-toggle="modal" data-target="#login-modal" class="btn_login" title="login">
                                            <i class="fa fa-sign-in"></i>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                    </div>   
                                </div> 
                            </div>

                            <div class="mobile-menu-area hp2-mmenu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <nav class="active-mobile-menu">
                                                <ul>
                                                    <li><a href="<?= site_url("Main"); ?>">Home</a>
                                                    </li>
                                                    <li><a href="#">Shop</i></a>
                                                        <ul>
                                                            <?php foreach ($category as $row) { ?>
                                                                <li><a href="#"><?= $row['name']; ?></a>
                                                                    <ul>
                                                                    
                                                                    <?php foreach ($row['child'] as $child) { ?>
                                                                        <li><a href="<?= site_url("Main/products/") . $child['category_id']; ?>"><?= $child['name']; ?></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                    </ul>
                                                                </li>
                                                            <?php } ?>

                                                        </ul>

                                                    </li>
                                                    <li><a href="<?= site_url("Main/new_arrival"); ?>">New Arrival</a>
                                                    </li>
                                                    <li><a href="<?= site_url("Main/sales"); ?>">Sales</a>
                                                    </li>

                                                    <li><a href="#">Collection</i></a>
                                                        <ul>
                                                            <?php foreach ($category as $row) { ?>
                                                                <li><a href="#"><?= $row['name']; ?></a>
                                                                    <ul>
                                                                    
                                                                    <?php foreach ($row['child'] as $child) { ?>
                                                                        <li><a href="<?= site_url("Main/products/") . $child['category_id']; ?>"><?= $child['name']; ?></a>
                                                                        </li>
                                                                    <?php } ?>
                                                                    </ul>
                                                                </li>
                                                            <?php } ?>

                                                        </ul>

                                                    </li>
                                                    <li><a href="<?= site_url("Main/contact"); ?>">Contact us</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header main menu end-->
            </div>