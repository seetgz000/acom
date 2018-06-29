
<!-- Main footer area start-->

<div class="main-footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="footer-content-wrapper">
                    <div class="footer-content">
                        <div id="f-about" class="footer-title def-funderline ftitle-about posr">
                            <h5 class="active-about">Shopping Details</h5>
                        </div>
                        <div class="footer-text">
                            <p><?= $shopping_details[0]['description'] ?></p>
                        </div>

                        <ul class="footer-social-icon">
                            <li><a href="#"><i class="zmdi zmdi-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="zmdi zmdi-rss"></i></a>
                            </li>
                            <li><a href="#"><i class="zmdi zmdi-youtube"></i></a>
                            </li>
                            <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="footer-list-wrapper">
                    <div id="f-info" class="footer-title def-funderline ftitle-info posr">
                        <h5 class="active">Information</h5>
                    </div>
                    <ul class="footer-list-text jscroll-info">
                        <li><a href="shop.html" title="New products">New products</a>
                        </li>
                        <li><a href="single-product.html" title="Best sellers">Best sellers</a>
                        </li>
                        <li><a href="shop.html" title="Our stores">Our stores</a>
                        </li>
                        <li><a href="contact.html" title="Contact us">Contact us</a>
                        </li>
                        <li><a href="index2.html" title="Sitemap">Sitemap</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="footer-list-wrapper">
                    <div id="f-myac" class="footer-title def-funderline ftitle-myA posr">
                        <h5 class="active">My account</h5>
                    </div>
                    <ul class="footer-list-text jscroll-myac">
                        <li><a href="my-account.html" title="My orders">My orders </a>
                        </li>
                        <li><a href="my-account.html" title="My credit slips">My credit slips </a>
                        </li>
                        <li><a href="index2.html" title="My addresses">My addresses</a>
                        </li>
                        <li><a href="shop.html" title="Specials">Specials</a>
                        </li>
                        <li><a href="my-account.html" title="My personal info">My personal info</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="footer-list-wrapper">
                    <div id="f-cussve" class="footer-title def-funderline def-funderline2 ftitle-cus posr">
                        <h5 class="active">Customer Service</h5>
                    </div>
                    <ul class="footer-list-text jscroll-cussrve">
                        <li><a href="contact.html" title="Contact us">Contact us</a>
                        </li>
                        <li><a href="index2.html" title="Discount">Discount</a>
                        </li>
                        <li><a href="index2.html" title="Site map">Site map</a>
                        </li>
                        <li><a href="about.html" title="About us">About us</a>
                        </li>
                        <li><a href="contact.html" title="Custom service">Custom service</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main footer area end-->

<!--Footer bottom area start-->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12 footer-bottom-left">
                <div class="footer-bottom-text">
                    <p>Copyright <i class="fa fa-copyright"></i> <a href="https://hastech.company/" target="_blank">Hastech.</a> All Rights Reserved</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 footer-bottom-right">
                <div class="footer-bottom-image">
                    <a href="#"><img src="<?= site_url(); ?>images/payment/p.png" alt="domino" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="to-top posr">
    <a href="#"><i class="zmdi zmdi-arrow-merge"></i></a>
</div>
</div>
<!--Footer bottom area end-->


<div id="login-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="<?= base_url() ?>main/login">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-header-logo">
                        <div class="logo-container align-center">
                            <a href="<?= base_url() ?>/main"><img class="modal-logo" src="<?= base_url() ?>images/logo_1.png" title="MarketShop" alt="MarketShop" /></a>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="align-center">
                        <p class="modal-form-header-font">Login and start shopping now!</p>
                    </div>
                    <div>
                        <?php if (!empty($this->session->flashdata('login_error'))) { ?>
                            <div class='alert alert-danger alert-dismissable align-center' style="margin-left:10%;margin-right:10%;">
                                <?php echo $this->session->flashdata('login_error'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="email" class="form-control" placeholder="Email" name="username">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default modal-form-button">Login Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="register-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="<?= base_url() ?>main/register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-header-logo">
                        <div class="logo-container align-center">
                            <a href="<?= base_url() ?>/main"><img class="modal-logo" src="<?= base_url() ?>images/logo_1.png" title="MarketShop" alt="MarketShop" /></a>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="align-center">
                        <p class="modal-form-header-font">Register Now! It's free!</p>
                    </div>
                    <div>
                        <?php if (!empty($this->session->flashdata('register_error'))) { ?>
                            <div class='alert alert-danger alert-dismissable align-center' style="margin-left:10%;margin-right:10%;">
                                <?php echo $this->session->flashdata('register_error'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="email" class="form-control" placeholder="Email" name="username">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label>Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label>Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password2">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label>Referrer Code <small>(optional)</small></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                                    <input type="text" class="form-control" placeholder="Referrer Code" name="referrer_code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default modal-form-button">Register Now</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- END QUICKVIEW PRODUCT -->

<!-- all js here -->
<!-- jquery latest version -->
<script src="<?= site_url(); ?>js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="<?= site_url(); ?>js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="<?= site_url(); ?>js/owl.carousel.min.js"></script>
<!-- meanmenu js -->
<script src="<?= site_url(); ?>js/jquery.meanmenu.js"></script>
<!-- jquery-ui js -->
<script src="<?= site_url(); ?>js/jquery-ui.min.js"></script>
<!-- wow js -->
<script src="<?= site_url(); ?>js/wow.min.js"></script>
<!-- plugins js -->
<script src="<?= site_url(); ?>js/plugins.js"></script>
<!-- Nivo slider pack js -->
<script src="<?= site_url(); ?>js/slider/jquery.nivo.slider.pack.js"></script>
<!-- nivo active js -->
<script src="<?= site_url(); ?>js/slider/nivo-active.js"></script>
<!-- fancybox js -->
<script src="<?= site_url(); ?>js/jquery.fancybox.js"></script>
<!-- counter up js -->
<script src="<?= site_url(); ?>js/jquery.counterup.min.js"></script>
<!-- Treeview js -->
<script src="<?= site_url(); ?>js/jquery.treeview.js"></script>
<!-- elevateZoom js -->
<script type="text/javascript" src="<?= site_url(); ?>js/jquery.elevateZoom-3.0.8.min.js"></script>
<!-- main js -->
<script src="<?= site_url(); ?>js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script>
    $(document).on('click', '.delete-cart-item-button', function (e) {
        e.preventDefault();
        var product_id = $(this).data('product');
        var model_id = $(this).data('model');

        $.confirm({
            title: 'Delete cart item.',
            content: 'Are you sure you want to delete this item from your cart? Deleted items will be permanetly deleted',
            buttons: {
                confirm: function () {

                    postParam = {
                        product_id: product_id,
                        model_id: model_id
                    }

                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>main/delete_cart_item/' + product_id + '/' + model_id,
                        data: postParam,
                        success: function (data) {
//                            $.alert({
//                                title: 'Cart item deleted',
//                                content: 'Click ok to continue',
//                            });
                            location.reload();
                        }, error: function () {
                            alert('delete failed');
                        }
                    });
                },
                cancel: function () {
                    $.alert('Canceled!');
                }
            }
        });
    });
</script>
</body>

</html>