

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
                                <li>Shipping Details</li>
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
                                <p>Shipping Details</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="shop-mega-category">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="productWidgets">
                                    <div class="tab-content-wrapper">
                                        <div class="row">
                                        <div class="shipping_details_container">
                                            <p><?php echo $shippingDetails[0][0]['value']; ?></p>
                                            <table class="table shipping_table">
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $shippingDetails[0][8]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][9]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][1]['value']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $shippingDetails[0][6]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][2]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][3]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][10]['value']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $shippingDetails[0][7]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][4]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][5]['value']; ?></td>
                                                        <td><?php echo $shippingDetails[0][11]['value']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php foreach($shippingDetails as $key=>$row) {
                                            if($key > 0 ) { ?>
                                                <div class="cod_container">
                                                    <?php foreach ($row as $value) { ?>
                                                        <p><?php echo $value['value'] ?></p>
                                                    <?php } ?>
                                                </div>
                                        <?php }
                                            }
                                        ?>
                                           
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