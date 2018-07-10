

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
                                        <a href="<?= site_url("Main"); ?>" title="Return to home"><i class="fa fa-home"></i></a>
                                    </div>
                                </li>
                                <li>Search</li>
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
                                <p>Search Result</p>
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
                                                        <?php if ($row['discount_price'] != 0) { ?>
                                                            <div class="product-label">
                                                                <div class="label-sale">Sale</div>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="priduct-img-wrapper posr">
                                                            <div class="product-img">
                                                                <a href="<?= site_url('Main/product/'.$row['product_id']); ?>"><img src="<?= site_url().$row['thumbnail']; ?>" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-hover-img">
                                                                <a href="<?= site_url('Main/product/'. $row['product_id']); ?>"><img src="<?= site_url().$row['thumbnail2']; ?>" alt="" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-bottom-text posr">
                                                            <div class="product-bottom-title deft-underline2">
                                                                <a href="<?= site_url('Main/product/'.$row['product_id']); ?>" title="<?= $row['product_name']; ?>"><h4><?= $row['product_name']; ?></h4></a>
                                                            </div>
                                                            <div class="product-bottom-price">
                                                                <?= $row['price']; ?>
                                                            </div>
                                                            <div class="product-btn">
                                                                <div class="product-qview-search">
                                                                    <a class="btn-def btn-product-qview q-view" data-toggle="modal" data-target="<?= '#productModal'.$row['product_id'] ?>" href="#">
                                                                    <i class=" product-search fa fa-shopping-cart" > &nbsp </i>Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- QUICKVIEW PRODUCT -->
                                            <div id="quickview-wrapper">
                                                <!-- Modal -->
                                                <div class="modal fade" id="<?= 'productModal'.$row['product_id'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="modal-product">
                                                                    <div class="product-images">
                                                                        <!--modal tab start-->
                                                                        <div class="portfolio-thumbnil-area-2">
                                                                            <div class="tab-content active-portfolio-area-2">

                                                                                <?php 
                                                                                    $where = array(
                                                                                        'product_id' => $row['product_id']
                                                                                    );
                                                                                    $images = $this->Product_model->get_product_images_where($where);
                                                                                    $i = 0; foreach($images as $image){ 
                                                                                    ?>
                                                                                    
                                                                                <div role="tabpanel" class="tab-pane <?= $i==0?'active':''; ?>" id="tab-<?= $row['product_id'].'-'.$i; ?>">
                                                                                    <div class="tab-single-image">
                                                                                        <img src="<?= site_url().$image['url']; ?>" alt="" />
                                                                                    </div>
                                                                                </div>
                                                                                <?php $i++; } ?>
                                                                            </div>
                                                                            <div class="product-more-views-2">
                                                                                <div class="thumbnail-carousel-modal-2" data-tabs="tabs">

                                                                                    <?php $i=0; foreach($images as $image){ ?>
                                                                                        <a href="#tab-<?= $row['product_id'].'-'.$i; ?>" aria-controls="tab-1" role="tab" data-toggle="tab">
                                                                                            <img src="<?= site_url().$image['url']; ?>" alt="" />
                                                                                        </a>
                                                                                    <?php $i++; } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--modal tab end-->
                                                                    <!-- .product-images -->
                                                                    <div class="product-info">
                                                                        <h1><?= $row['product_name']; ?></h1>
                                                                        <div class="price-box-3">
                                                                            <?php if ($row['discount_price'] > 0) { ?>
                                                                                <div class="s-price-box"> <span class="new-price"><?= $row['discount_price']; ?></span> 
                                                                                <span class="old-price"><?= $row['price']; ?></span> </div>
                                                                            <?php } else { ?>
                                                                                <div class="s-price-box"> <span class="new-price"><?= $row['price']; ?></span> 
                                                                            <?php } ?>
                                                                        </div>
                                                                        <hr/>
                                                                        <div class="quick-add-to-cart">
                                                                            <form id="product_form<?= $row['product_id'] ?>" method="post" class="cart">
                                                                                <div class="skill-checklist">
                                                                                    <label for="skillc<?= $row['product_id'] ?>"><span class="italic">Size</span>
                                                                                    </label>
                                                                                    <select id="skillc<?= $row['product_id'] ?>" name="model_id" class="form-control" style="margin-bottom:5%; width:62%; height:34px;">
                                                                                        <?php 
                                                                                        $models = $this->Product_model->get_product_models_where($where);
                                                                                        foreach($models as $modelRow){ ?>
                                                                                        <option value="<?= $modelRow['model_id']; ?>"><?= $modelRow['model']; ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="numbers-row">
                                                                                    <h4 class="qty_label">QTY:</h4>
                                                                                    <input type="number" name="quantity" min="1" value="1"> </div>
                                                                                <button class="single_add_to_cart_button cart-stylei" onclick="add_to_cart(<?= $row['product_id']; ?>)"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                                            </form>
                                                                        </div>
                                                                        <a href="<?= site_url('Main/product/'.$row['product_id']); ?>" class="btn_full_info">View Full Info</a>
                                                                    </div>
                                                                    <!-- .product-info -->
                                                                </div>
                                                                <!-- .modal-product -->
                                                            </div>
                                                            <!-- .modal-body -->
                                                        </div>
                                                        <!-- .modal-content -->
                                                    </div>
                                                    <!-- .modal-dialog -->
                                                </div>
                                                <!-- END Modal -->
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
        </div>
        </div>
      
    </div>

    <!--Main shop area end-->

    <!--Hair top banner end-->
<script>
    function add_to_cart(id){
        var data = $("#product_form" + id).serialize();
        $.post("<?= site_url('Main/add_to_cart/'); ?>"+ id,data,function(response){
            if(response.status){
                $("#sticky-header").load(location.href + " #sticky-header");
                alert("added to cart");
            }else{
                alert("something went wrong");
            }
        },'json');
    }
</script>