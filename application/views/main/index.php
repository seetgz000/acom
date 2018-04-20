
        <!--slider area are start-->
        <div class="slider-container slider2-container hp3-slider" style="height: 100%;">
            <!-- Slider Image -->
            <div id="home3-slider" class="nivoSlider slider-image">
                <?php foreach($banner as $row){ ?>
                    <img src="<?= site_url().$row['url']; ?>">
                <?php } ?>
            </div>

            <!-- Slider2 Caption 2 -->
            <div id="htmlcaption5" class="nivo-html-caption">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="slider4-cap-wrapper4 cap-wrapper">
                        <div class="captext-pos1">
                            <div class="slider3-btext wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                                <h2>Lueur trend.</h2>
                            </div>
                            <div class="slider3-stext wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                                <h4>lookbook ecomerce theme</h4>
                            </div>
                            <div class="slider3-btn1 wow fadeInDown" data-wow-duration=".9s" data-wow-delay="0.8s">
                                <a class="btn-trans" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider2 Caption 1 -->
            <div id="htmlcaption6" class="nivo-html-caption">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="slider2-cap-wrapper2 cap-wrapper">
                        <div class="captext-pos2 slider-capstyle3">
                            <div class="slider3-toptext wow fadeInRight" data-wow-duration=".5s" data-wow-delay="0.8s">
                                <h4>Fashion lookbook 2016</h4>
                            </div>
                            <div class="slider3-btext2 wow fadeInRight" data-wow-duration=".9s" data-wow-delay="0.8s">
                                <h2>Hipster Fashion</h2>
                            </div>
                            <div class="slider3-btext2 wow fadeInRight" data-wow-duration=".5s" data-wow-delay="0.8s">
                                <h2> Trend 2016.</h2>
                            </div>
                            <div class="slider3-btn slider3-btn2 wow fadeInRight" data-wow-duration=".9s" data-wow-delay="0.8s">
                                <a class="btn-nontrans" href="shop.html">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--slider area are end-->

        <!--Product banner area start-->

        <div class="product-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="product-banner-left">
                            
                            <div class="pbanner-image hvreff-defm20 posr">
                                <div class="product-banner-caption">
                                    <h1>View New Arrivals</h1>
                                </div>
                                <img src="<?= site_url(); ?>images/discount/cms7.jpg" alt="" />
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="product-banner-right">
                            <!-- InstaWidget -->
                            <a href="https://instawidget.net/v/tag/cosmetic" id="link-cb34915df086337386db6abf59bbec0fe2b461c075f5c88322bb9055401eb9e0">#cosmetic</a>
                            <script src="https://instawidget.net/js/instawidget.js?u=cb34915df086337386db6abf59bbec0fe2b461c075f5c88322bb9055401eb9e0&width=100%"></script>
                            <div class="img-banner">
                                <div class="pbanner-image hvreff-defm10 posr">
                                    <div class="product-banner-caption">
                                        <h1>Promotions</h1>
                                    </div>
                                    <img src="<?= site_url(); ?>images/discount/cms9.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product banner area end-->

        <!--Banner3 top area start
        <div class="banner3-middle">
            <div class="banner-full-wrapper hp3-bannerbag-md">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-xs-12">
                            <div class="banner-content">
                                <div class="banner-sstitle">
                                    <h5>Supper deal only today!</h5>
                                </div>
                                <div class="banner-stitle">
                                    <h3>Mega sale off</h3>
                                </div>
                                <div class="banner-btitle">
                                    <h2>Up to <span class="text-color">70%</span></h2>
                                </div>
                                <div class="banner-text btext">
                                    <p>Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura. Aenean commodo ligula eget dolor Aenean massa. Portals seize data-driven, tag expedite.</p>
                                </div>
                                <div class="banner-button">
                                    <a class="btn-back2" href="shop.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 col-xs-12">
                            <div class="banner-image text-right">
                                <img src="<?= site_url(); ?>images/banner/h3b5.png" alt="Lueur" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        Banner3 top area end-->

        <!--Featured product area start-->
        <div class="featured-product-area home3-fp">
            <div class="container">
                <div class="row">
                    <div class="featured-wrapper">
                        <div class="col-xs-12">
                            <div class="home-featured-head text-center">
                                <div class="section-title title-head">
                                    <h3>Our Products</h3>
                                    <img src="<?= site_url(); ?>images/icons/icon-title.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>          
                        <?php foreach($latest as $row){ ?>
                            <?php 
                            $row['product_name'] = $row['name'];
                                
                                $this->Product_model->to_html($row); ?>
                        <?php } ?>                 
                    </div>
                </div>
            </div>
        </div>

        <!--Featured product area end-->

       
     

        <!-- Google map area start-->

        <div class="hp3-map-area map-area">
            <div id="googleMap2999"></div>
        </div>

        <!-- Google map area end-->
