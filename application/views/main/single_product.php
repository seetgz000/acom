<?php
  $label_data_class=array(
    1=>'label-bestSale',
    2=>'label_new',
    3=>'label-sale',
    4=>''
  );
?>
<div class="col-md-4">
    <div class="single-product single-featured-product">
        <div class="product-wrapper posr">
            <div class="product-label">
              <?php if($product['label']!=4){ ?>
                <div class="<?=$label_data_class[$product['label']]?>"><?=$label_data[$product['label']-1]['Value']?></div>
              <?php } ?>
            </div>
            <div class="priduct-img-wrapper posr">
                <div class="product-img">
                    <a href="<?= site_url('Main/product/'. $product['product_id']); ?>"><img src="<?= site_url().$product['thumbnail']; ?>" alt="" />
                    </a>
                </div>
                <div class="product-hover-img">
                    <a href="<?= site_url('Main/product/'. $product['product_id']); ?>"><img src="<?= site_url().$product['thumbnail2']; ?>" alt="" />
                    </a>
                </div>

                <div class="product-inner-text">

                </div>
            </div>
            <div class="product-bottom-text posr">
                <div class="product-bottom-title deft-underline2">
                    <a href="<?= site_url('Main/product/'. $product['product_id']); ?>" title="Mirum est notare"><h4><?= $product['product_name']; ?></h4></a>
                </div>
                <div class="product-bottom-price">
                    <span><?= $product['price']; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
