
<!-- Main footer area start-->

<div class="main-footer-area">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-6 col-xs-12">
                <div class="footer-list-wrapper">
                    <div class="footer_heading def-funderline def-funderline2 ftitle-cus posr">
                        <h5>Quick Link</h5>
                    </div>
                    <ul class="footer_list_text jscroll-cussrve">
                        <li><a href="<?= site_url("Main/contact"); ?>" title="Contact us">Contact us</a>
                        </li>
                        <li><a href="<?= site_url("Main/shipping_details"); ?>" title="Shipping Details">Shipping Details</a>
                        </li>
                        <li><a href="<?= site_url("Main/term"); ?>" title="Terms & Condition">Terms & Condition</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="footer-content-wrapper">
                    <div class="footer-content">
                        <div class="footer_heading def-funderline ftitle-about posr">
                            <h5>Follow Us</h5>
                        </div>

                        <ul class="footer-social-icon">
                            <li><a href="https://www.facebook.com/shopcherie.co/"><i class="zmdi zmdi-facebook"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/shopcherie.co/"><i class="zmdi zmdi-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
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
            <div class="col-md-12 col-sm-12 col-xs-12 footer-bottom-left">
                <div class="footer-bottom-text">
                    <p>Copyright <i class="fa fa-copyright"></i> <a href="https://hastech.company/" target="_blank">Hastech.</a> All Rights Reserved</p>
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