
<!--Breadcrumb start-->
<div class="subpage-main-wrapper about-full">
    <div class="breadcrumbs-wrapper breadcumbs-bg1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs breadcrumbs-style1 sep1 posr">
                        <ul>
                            <li>
                                <div class="breadcrumbs-icon1">
                                    <a href="index.html" target="_blank" title="Return to home"><i class="fa fa-home"></i></a>
                                </div>
                            </li>
                            <li><?= $product['name']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb end-->

    <div class="compare-area compare-single-productt">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-thumbnail-wrapper">
                        <div class="single-product-tab">
                            <ul class="single-tab-control" role="tablist">
                                <?php $i = 0;
                                foreach ($images as $image) { ?>
                                    <li class="<?= $i == 0 ? 'active' : ''; ?>">
                                        <a href="#tab-<?= $i; ?>" aria-controls="tab-1" role="tab" data-toggle="tab"><img src="<?= site_url() . $image['url']; ?>" alt="Domino" />
                                        </a>
                                    </li>
    <?php $i++;
} ?>

                            </ul>
                        </div>
                        <div class="single-cat-main">
                            <div class="tab-content">
<?php $i = 0;
foreach ($images as $image) { ?>
                                    <div role="tabpanel" class="tab-pane <?= $i == 0 ? 'active' : ''; ?>" id="tab-<?= $i; ?>">
                                        <div class="tab-single-image">
                                            <a href="<?= site_url() . $image['url']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?= site_url() . $image['url']; ?>" alt="" />
                                            </a>
                                        </div>
                                    </div>
    <?php $i++;
} ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="compare-content-wrap">
                        <div class="cmain-heading text-uppercase">
                            <h3><?= $product['product_name']; ?></h3>
                        </div>

                        <div class="compare-conpart compare-conpart-text">
                            <div class="skill-long-text">
<?= $product['description']; ?>
                            </div>
                        </div>
                        <form id="product_form">
                            <div class="compare-conpart-pm compare-bottom">
                                <div class="old-new-price">
<?= $product['price']; ?>
                                </div>
                                <div class="plus-minus-text">Quantity</div>
                                <div class="skill-plusminus-wrap">
                                    <div class="skill-plusminus">
                                        <div class="skill-minus qtybutton">-</div>
                                        <input type="text" name="quantity" value="1" class="cart-plus-minus-box" />
                                        <div class="skill-plus qtybutton">+</div>
                                    </div>
                                </div>
                                <div class="skill-cart-option skill-sep posr">
                                    <a href="javascript:void();" onclick="add_to_cart(<?= $product['product_id']; ?>)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <div class="compare-conpart skill-communicate">

                                <div class="skill-checklist">
                                    <label for="skillc"><span class="italic">Size</span>
                                    </label>
                                    <select id="skillc" name="model_id">
<?php foreach ($models as $row) { ?>
                                            <option value="<?= $row['model_id']; ?>"><?= $row['model']; ?></option>
<?php } ?>
                                    </select>
                                </div>

                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- up sale product area start-->
    <div class="featured-product-area single-upsale-product">
        <div class="container">
            <div class="row">
                <div class="featured-wrapper">
                    <div class="col-xs-12">
                        <div class="home-featured-head text-center ">
                            <div class="section-title title-head">
                                <h3>Up-sells</h3>
                                <img src="images/icons/icon-title.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="featured-product-wrapper">
                        <div class="active-featured-owl def-owl">
<?php foreach ($promotion as $row) { ?>
    <?php $this->Product_model->to_html($row); ?>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Up sale area end-->

    <!--related product area start-->
    <div class="featured-product-area single-related-product">
        <div class="container">
            <div class="row">
                <div class="featured-wrapper">
                    <div class="col-xs-12">
                        <div class="home-featured-head text-center">
                            <div class="section-title title-head">
                                <h3>Related Products</h3>
                                <img src="images/icons/icon-title.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="featured-product-wrapper">
                        <div class="active-featured-owl def-owl">
<?php foreach ($related as $row) { ?>
    <?php $this->Product_model->to_html($row); ?>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--related product area end-->


</div>
<script>
    function add_to_cart(id) {
        var data = $("#product_form").serialize();
        $.post("<?= site_url('Main/add_to_cart/'); ?>" + id, data, function (response) {
            if (response.status) {
                alert("added to cart");
                $("#sticky-header").load(location.href + " #sticky-header");
            } else {
                alert("something went wrong");
            }
        }, 'json');
    }
</script>