<div class="col-md-4">
    <div class="single-product single-featured-product">
        <div class="product-wrapper posr">
            <div class="product-label">
                <div class="label-salee"></div>
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
                    <a href="single-product.html" title="Mirum est notare"><h4><?= $product['product_name']; ?></h4></a>
                </div>
                <div class="product-bottom-price">
                    <span><?= $product['price']; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>