

    <div class="hair-main-wrapper">
        <div class="page-banner1">
            <img src="images/banner/hair.jpg" alt="" />
        </div>
        <div class="breadcrumbs-wrapper breadcumbs-bg1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs breadcrumbs-style1 sep1 posr">
                            <ul>
                                <li>
                                    <div class="breadcrumbs-icon1">
                                        <a href="index.html" title="Return to home"><i class="fa fa-home"></i></a>
                                    </div>
                                </li>
                                <li>Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Main shop area start-->

        <div class="main-shop-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="top-full-tarea">
                            <div class="full-ttlleft">
                                <p>Shop</p>
                            </div>
                            <div class="full-ttlright">
                                <div class="selected-items">
                                    <p>There are <?= count($products); ?> products.</p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="mainshop-area">
                            <div class="mainshop-top">
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="shop-mega-category">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="productWidgets">
                                    <div class="tab-content-wrapper">
                                        <div class="row">
                                            <?php foreach($products as $row){ ?>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="single-product">
                                                    <div class="product-wrapper posr">
                                                        <div class="product-label">
                                                            <div class="label-sale">Sale</div>
                                                        </div>
                                                        <div class="priduct-img-wrapper posr">
                                                            <div class="product-img">
                                                                <a href="<?= site_url('Main/product/'.$row['product_id']); ?>"><img src="<?= site_url().$row['thumbnail']; ?>" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-inner-text">
                                                                <div class="product-social-icon social-icon">
                                                                    <ul>
                                                                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                                        </li>
                                                                        <li><a href="index.html"><i class="fa fa-heart-o"></i></a>
                                                                        </li>
                                                                        <li><a href="<?= site_url('Main/product/'.$row['product_id']); ?>"><i class="fa fa-refresh"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="product-btn">
                                                                    <div class="product-qview-search">
                                                                        <a class="btn-def btn-product-qview q-view" data-toggle="modal" data-target=".modal" href="#"><i class=" product-search fa fa-search" ></i> quick View</a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-review">
                                                            <ul>
                                                                <li><a href="#"><i class="fa fa-star-o"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-star-o"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-star-o"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-star-o"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-star-o"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-bottom-text posr">
                                                            <div class="product-bottom-title deft-underline2">
                                                                <a href="<?= site_url('Main/product/'.$row['product_id']); ?>" title="Fiant sollemnes"><h4><?= $row['product_name']; ?></h4></a>
                                                            </div>
                                                            <div class="product-bottom-price">
                                                                <?= $row['price']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                           
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                        <!--Pagination 
                        <div class="pagination-wrapper">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="pagi-itemshow">
                                        <p>Showing 1 - 12 of 13 items</p>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="shop-pagination pagi-style1">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-angle-left"></i></a>
                                            </li>
                                            <li class="active"><a href="#">1</a>
                                            </li>
                                            <li><a href="#">2</a>
                                            </li>
                                            <li><a href="#">3</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="compare-items">
                                        <a href="compare.html"><span>Compare (0) <i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                                            -->
                    </div>
                </div>
            </div>
        </div>
      
    </div>

    <!--Main shop area end-->

    <!--Hair top banner end-->
