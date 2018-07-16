
        <!--slider area are start-->
        <div class="slider-container slider2-container hp3-slider" style="height: 100%;">
            <!-- Slider Image -->
            <div id="home3-slider" class="nivoSlider slider-image">
                <?php foreach($banner as $row){ ?>
                    <img src="<?= site_url().$row['url']; ?>">
                <?php } ?>
            </div>
        </div>
        <!--slider area are end-->

        <!--Product banner area start-->

        <div class="product-banner-area">
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-md-6 col-sm-12">
                        <div class="product-banner-left" style="height:100%;">
                            <a href="<?= site_url($indexPic[0]['link']); ?>">
                                <div class="pbanner-image hvreff-defm20 posr" style="height:100%;">
                                    <div class="product-banner-caption">
                                        <h1><?php echo $indexPic[0]['caption']; ?></h1>
                                    </div>
                                    <img class="new_arrival_index_pic" src="<?= site_url() . $indexPic[0]['thumbnail'] ?>" alt="" />
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="product-banner-right" style="height:100%;">
                            <!-- InstaWidget -->
                            <a href="https://instawidget.net/v/user/shopcherie.co" id="link-e700b9d9e2c8459b930edc6c2b25b088b3b740eb712d1b9d2035bd23c563aec1">@shopcherie.co</a>
                            <script src="https://instawidget.net/js/instawidget.js?u=e700b9d9e2c8459b930edc6c2b25b088b3b740eb712d1b9d2035bd23c563aec1&width=100%"></script>
                            <a href="<?= site_url($indexPic[1]['link']); ?>">
                                <div class="img-banner" style="height:40%;">
                                    <div class="pbanner-image hvreff-defm10 posr" style="height:100%;">
                                        <div class="product-banner-caption">
                                            <h1><?php echo $indexPic[1]['caption']; ?></h1>
                                        </div>
                                        <img class="discount_index_pic" src="<?= site_url() . $indexPic[1]['thumbnail'] ?>" alt="" />
                                    </div>
                                </div>
                            </a>
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
