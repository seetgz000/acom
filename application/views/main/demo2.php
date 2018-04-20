<html>
    <head>
        <title>ACOM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/acom-dark.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/js/plugins/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/js/plugins/slick/slick-theme.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
    </head>
    <body>
        <div class="row clearfix">
            <div class="header-upper-container col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="inner-container">
                    <a href="#"><p class="header-upper-fonts pull-right">Sign Up</p></a>
                    <a href="#"><p class="header-upper-fonts pull-right">Login</p></a>
                </div>
            </div>
            <div class ="header-center-container col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="inner-container">
                    <div class="row">
                        <div class="logo-container full-height col-md-3 col-lg-3">
                            <img class="logo" src="<?= base_url()?>images/demo-logo.png">
                        </div><div class="search-bar-container full-height col-md-9 col-lg-9">
                            <div class="col-md-10 col-lg-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-addon search-bar-button"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2">
                                <a href="#"><i class="fa fa-shopping-cart cart-button"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-lower-container col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="inner-container">
                    <nav class="header-navbar">
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Furnitures" data-toggle="dropdown">Furnitures</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Furnitures">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Chairs</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Tables</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Beds</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Sofas</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Closets</p></a></li>
                            </ul>
                        </div>
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Electronics" data-toggle="dropdown">Electronics</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Electronics">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">TVs</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Tablets</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Laptops</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">PCs</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Radios</p></a></li>
                            </ul>
                        </div>
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Hardwares" data-toggle="dropdown">Hardwares</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Hardwares">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Hammers</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Axes</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Screwdrivers</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Multitools</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Air-pumps</p></a></li>
                            </ul>
                        </div>
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Sports" data-toggle="dropdown">Sports</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Sports">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Sportswears</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Sport Accessories</p></a></li>
                            </ul>
                        </div>
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Men" data-toggle="dropdown">Men's Fashion</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Men">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Men's Pants</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Men's Shorts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Men's T-shirts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Men's Shirts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Men's Formal Wear</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Men's Accessories</p></a></li>
                            </ul>
                        </div>
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Women" data-toggle="dropdown">Women's Fashion</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Women">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Women'sPants</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Women'sShorts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Women'sT-shirts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Women'sShirts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Women'sFormal Wear</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Women'sAccessories</p></a></li>
                            </ul>
                        </div>
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Kids" data-toggle="dropdown">Kid's Fashion</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Kids">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Kid's Pants</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Kid's Shorts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Kid's T-shirts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Kid's Shirts</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Kid's Formal Wear</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Kid's Accessories</p></a></li>
                            </ul>
                        </div>
                        <div class="dropdown header-navbar-font inline">
                            <a class="header-navbar-font dropdown-toggle" id="Toys" data-toggle="dropdown">Kid's Toys</a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="Toys">
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Action Figures</p></a></li>
                                <li><a class="subcategory-content-font"><p class="ellipsis no-margin">Dolls</p></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="content-container col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="inner-container">
                    <div class="carousel-container">
                        <a href="#" class="slick-cover"><div class="carousel-content"><img class="carousel-image" src="https://cdn1.hdwallpapers.co.in/wallpapers/I-Love-Shopping-Banner-Wallpaper-586x293.jpg"></div></a>
                        <a href="#" class="slick-cover"><div class="carousel-content"><img class="carousel-image" src="http://www.myeasycoupon.com/wp-content/uploads/2016/03/banner-1140x380.jpg"></div></a>
                        <a href="#" class="slick-cover"><div class="carousel-content"><img class="carousel-image" src="http://www.pmmc.ae/images/pageimages/330308519banner_3.jpg"></div></a>
                    </div>
                    <h1 class="content-title-font">Latest</h1>
                    <div class="latest-container col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
                        <div class="product-container col-md-4 col-lg-4 no-padding">
                            <div class="product-thumbnail-container">
                                <img class="cropped" src="http://e-file.huawei.com/-/media/EBG/Images/product/telepresence-video-communications/te30/TE30_%E5%8F%B3%E8%A7%86.jpg">
                            </div>
                            <div class="product-details-container">
                                <h2 class="product-name-font ellipsis">Sample Product 1</h2>
                                <p class="product-description-font ellipsis">Sample</p>
                                <p class="current-price-font">RM800</p>
                                <p class="full-price-font">RM1000</p>
                                <p class="discount-percentage-font">-20%</p>
                            </div>
                        </div>
                        <div class="product-container col-md-4 col-lg-4 no-padding">
                            <div class="product-thumbnail-container">
                                <img class="cropped" src="https://assets.logitech.com/assets/55374/2/hd-webcam-c525-gallery.png">
                            </div>
                            <div class="product-details-container">
                                <h2 class="product-name-font ellipsis">Sample Product 2</h2>
                                <p class="product-description-font ellipsis">Sample</p>
                                <p class="current-price-font">RM900</p>
                                <p class="full-price-font">RM1000</p>
                                <p class="discount-percentage-font">-10%</p>
                            </div>
                        </div>
                        <div class="product-container col-md-4 col-lg-4 no-padding">
                            <div class="product-thumbnail-container">
                                <img class="cropped" src="http://compass.microsoft.com/assets/06/34/0634ad6f-2114-49e7-883c-8e9464595360.jpg?n=ic_hd3000v2_otherviews01.jpg">
                            </div>
                            <div class="product-details-container">
                                <h2 class="product-name-font ellipsis">Sample Product 3</h2>
                                <p class="product-description-font ellipsis">Sample</p>
                                <p class="current-price-font">RM500</p>
                                <p class="full-price-font">RM1000</p>
                                <p class="discount-percentage-font">-50%</p>
                            </div>
                        </div>
                        <div class="product-container col-md-4 col-lg-4 no-padding">
                            <div class="product-thumbnail-container">
                                <img class="cropped" src="https://4.bp.blogspot.com/-t1Wna6-jaUQ/VMFPfbo1VfI/AAAAAAABbb4/x3AnyF-fOck/s0/Apple%2BBusiness_UHD.jpg">
                            </div>
                            <div class="product-details-container">
                                <h2 class="product-name-font ellipsis">Sample Product 4</h2>
                                <p class="product-description-font ellipsis">Sample</p>
                                <p class="current-price-font">RM800</p>
                            </div>
                        </div>
                        <div class="product-container col-md-4 col-lg-4 no-padding">
                            <div class="product-thumbnail-container">
                                <img class="cropped" src="https://dri1.img.digitalrivercontent.net/Storefront/Company/msintl/images/English/en-INTL-BLU-Win-HD-LTE-Blue-QJ4-00002/en-INTL-L-BLU-Win-HD-LTE-Blue-QJ4-00002-RM5-mnco.jpg">
                            </div>
                            <div class="product-details-container">
                                <h2 class="product-name-font ellipsis">Sample Product 5</h2>
                                <p class="product-description-font ellipsis">Sample</p>
                                <p class="current-price-font">RM999</p>
                            </div>
                        </div>
                        <div class="product-container col-md-4 col-lg-4 no-padding">
                            <div class="product-thumbnail-container">
                                <img class="cropped" src="http://www.iida.org/resources/content/2/9/7/0/images/HD-Vibia-Group-Product.JPG">
                            </div>
                            <div class="product-details-container">
                                <h2 class="product-name-font ellipsis">Sample Product 6</h2>
                                <p class="product-description-font ellipsis">Sample</p>
                                <p class="current-price-font">RM250</p>
                                <p class="full-price-font">RM500</p>
                                <p class="discount-percentage-font">-50%</p>
                            </div>
                        </div>
                    </div>

                    <div class="category-group-container col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
                        <h1 class="content-title-font">Tables</h1>
                        <div class="multi-carousel-container">
                            <div class="multi-carousel-content">
                                <div class="product-thumbnail-container">
                                    <img class="cropped" src="http://mockingbirdscafe.com/wp-content/uploads/2016/03/recent-designs-inc-introduces-three-new-palazzio-dining-tables-table-1033x741-291kb.jpg">
                                </div>
                                <div class="product-details-container">
                                    <h2 class="product-name-font ellipsis">Sample Table 1</h2>
                                    <p class="product-description-font ellipsis">Sample</p>
                                    <p class="current-price-font">RM200</p>
                                </div>
                            </div>
                            <div class="multi-carousel-content">
                                <div class="product-thumbnail-container">
                                    <img class="cropped" src="https://s-media-cache-ak0.pinimg.com/736x/fa/10/24/fa1024bde5cbd35948c7ec06f4e79c90--metal-dining-table-metal-coffee-tables.jpg">
                                </div>
                                <div class="product-details-container">
                                    <h2 class="product-name-font ellipsis">Sample Table 2</h2>
                                    <p class="product-description-font ellipsis">Sample</p>
                                    <p class="current-price-font">RM180</p>
                                    <p class="full-price-font">RM200</p>
                                    <p class="discount-percentage-font">-10%</p>
                                </div>
                            </div>
                            <div class="multi-carousel-content">
                                <div class="product-thumbnail-container">
                                    <img class="cropped" src="https://s-media-cache-ak0.pinimg.com/736x/d2/43/a4/d243a4a0e6661d26aaaa65bd48104f35--wood-tables-dinning-tables.jpg">
                                </div>
                                <div class="product-details-container">
                                    <h2 class="product-name-font ellipsis">Sample Table 3</h2>
                                    <p class="product-description-font ellipsis">Sample</p>
                                    <p class="current-price-font">RM300</p>
                                </div>
                            </div>
                            <div class="multi-carousel-content">
                                <div class="product-thumbnail-container">
                                    <img class="cropped" src="data:image/jpeg;base64,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">
                                </div>
                                <div class="product-details-container">
                                    <h2 class="product-name-font ellipsis">Sample Table 4</h2>
                                    <p class="product-description-font ellipsis">Sample</p>
                                    <p class="current-price-font">RM700</p>
                                </div>
                            </div>
                            <div class="multi-carousel-content">
                                <div class="product-thumbnail-container">
                                    <img class="cropped" src="https://s-media-cache-ak0.pinimg.com/736x/c2/1f/28/c21f286b6d00066ea6e28d4dee026655--kitchen-table-with-bench-dinning-table.jpg">
                                </div>
                                <div class="product-details-container">
                                    <h2 class="product-name-font ellipsis">Sample Table 5</h2>
                                    <p class="product-description-font ellipsis">Sample</p>
                                    <p class="current-price-font">RM200</p>
                                    <p class="full-price-font">RM400</p>
                                    <p class="discount-percentage-font">-50%</p>
                                </div>
                            </div>
                            <div class="multi-carousel-content">
                                <div class="product-thumbnail-container">
                                    <img class="cropped" src="http://legrattonaute.com/wp-content/uploads/2017/01/captivating-contemporary-dinette-sets-and-contemporary-round-dining-room-sets-with-images-Of-Contemporary-Dining-Table-Set.jpg">
                                </div>
                                <div class="product-details-container">
                                    <h2 class="product-name-font ellipsis">Sample Table 6</h2>
                                    <p class="product-description-font ellipsis">Sample</p>
                                    <p class="current-price-font">RM100</p>
                                </div>
                            </div>
                            <div class="multi-carousel-content">
                                <div class="product-thumbnail-container">
                                    <img class="cropped" src="http://ignitecam.co/wp-content/uploads/2017/05/dining-room-the-tips-for-buying-solid-wood-dining-table-sets-for-for-the-amazing-distressed-wood-dining-table-set-popular.jpg">
                                </div>
                                <div class="product-details-container">
                                    <h2 class="product-name-font ellipsis">Sample Table 7</h2>
                                    <p class="product-description-font ellipsis">Sample</p>
                                    <p class="current-price-font">RM700</p>
                                    <p class="full-price-font">RM1000</p>
                                <p class="discount-percentage-font">-30%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer-container col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="inner-container">
                </div>
            </footer>
        </div>
        <script src="<?= base_url() ?>js/plugins/slick/slick.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.carousel-container').slick({
                    dots: false,
                    infinite: true,
                    speed: 500,
                    fade: true,
                    cssEase: 'linear'
                });

                $('.multi-carousel-container').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    dots: false,
                    infinite: true,
                });
            });
        </script>
    </body>
</html>