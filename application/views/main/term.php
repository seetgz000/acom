

    <div class="hair-main-wrapper">
        <div class="page-banner1">
            <img src="images/banner/hair.jpg" alt="" />
        </div>
        <div class="breadcrumbs-wrapper breadcumbs-bg1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumbs breadcrumbs-style1 sep1 posr">
                            <ul>
                                <li>
                                    <div class="breadcrumbs-icon1">
                                        <a href="<?= site_url("Main"); ?>" title="Return to home"><i class="fa fa-home"></i></a>
                                    </div>
                                </li>
                                <li>Terms & Condition</li>
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
                    <div class="col-sm-12">
                        <div class="top-full-tarea">
                            <div class="full-ttlleft">
                                <p>Terms & Condition</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="shop-mega-category">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="productWidgets">
                                    <div class="tab-content-wrapper">
                                        <div class="row">
                                            <?php foreach ($term_and_condition as $row) { ?>
                                                <div class="term_container">
                                                    <h3><?=$row['term_and_condition_header']?></h3>
                                                    <?php foreach ($row['description'] as $description) { ?>
                                                        <p><?= $description['term_and_condition_description']; ?></p>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
      
    </div>