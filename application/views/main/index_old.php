<div class="carousel-container">
    <?php
    foreach ($banner as $row) {
        ?>
        <a href="<?= $row['link'] ?>" class="slick-cover"><div class="carousel-content"><img class="carousel-image" src="<?= base_url() . $row['url'] ?>"></div></a>
        <?php
    }
    ?>
</div>
<h1 class="content-title-font">Latest</h1>
<div class="latest-container col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
    <?php
    foreach ($latest as $row) {
        ?>
        <a href="<?= base_url() ?>main/product/<?= $row['product_id'] ?>">
            <div class="product-container col-md-4 col-lg-4 no-padding">
                <div class="product-thumbnail-container">
                    <img class="cropped" src="<?= base_url() . $row['thumbnail'] ?>">
                </div>
                <div class="product-details-container">
                    <h2 class="product-name-font ellipsis"><?= $row['name'] ?></h2>
                    <p class="product-description-font ellipsis"><?= $row['description'] ?></p>
                    <?php
                    if ($row['discount_price'] != 0) {
                        ?>
                        <p class="current-price-font ellipsis">RM<?= $row['discount_price'] ?></p>
                        <p class="full-price-font ellipsis">RM<?= $row['price'] ?></p>
                        <p class="discount-percentage-font ellipsis">-<?= $row['percentage'] ?>%</p>
                        <?php
                    } else {
                        ?>
                        <p class="current-price-font ellipsis">RM<?= $row['price'] ?></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </a>
        <?php
    }
    ?>
</div>
<?php
foreach ($category_group as $row) {
    ?>
    <div class="category-group-container col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding margin-bottom">
        <h1 class="content-title-font"><?= $row['name'] ?></h1>
        <div class="multi-carousel-container">
            <?php
            foreach ($row['product'] as $product) {
                ?>
                <a href="<?= base_url() ?>main/product/<?= $product['product_id'] ?>">
                    <div class="multi-carousel-content">
                        <div class="product-thumbnail-container">
                            <img class="cropped" src="<?= base_url() . $product['thumbnail'] ?>">
                        </div>
                        <div class="product-details-container">
                            <h2 class="product-name-font ellipsis"><?= $product['product_name'] ?></h2>
                            <p class="product-description-font ellipsis"><?= $product['description'] ?></p>
                            <?php
                            if ($product['discount_price'] != 0) {
                                ?>
                                <p class="current-price-fonthidden-sm hidden-xs">RM<?= $product['discount_price'] ?></p>
                                <p class="full-price-font hidden-sm hidden-xs">RM<?= $product['price'] ?></p>
                                <p class="discount-percentage-font hidden-sm hidden-xs">-<?= $product['percentage'] ?>%</p>
                                <?php
                            } else {
                                ?>
                                <p class="current-price-font hidden-sm hidden-xs">RM<?= $product['price'] ?></p>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>
            