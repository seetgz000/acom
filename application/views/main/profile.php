<!-- Breadcrumb Start-->
<ul class="breadcrumb">
    <li><a href="<?= base_url() ?>main"><i class="fa fa-home"></i></a></li>
    <li><a href="<?= base_url() ?>main/profile/<?= $user['user_id'] ?>">My Account</a></li>
</ul>
<!-- Breadcrumb End-->
<div class="container">
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-6" id="content">
            <h1 class="title">My Account</h1>
            <p class="lead">Hello, <strong><?= $user['name'] ?></strong>!</p>
            <?php if (!empty($this->session->flashdata('profile_error'))) { ?>
                <div class='alert alert-danger alert-dismissable align-center' style="margin-left:10%;margin-right:10%;">
                    <?php echo $this->session->flashdata('profile_error'); ?>
                </div>
            <?php } ?>
            <form method="POST" action="<?= base_url() ?>main/edit_profile">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding no-margin">
                    <label>Email</label>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" class="form-control" value="<?= $user['username'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding no-margin">
                    <label>Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $user['name'] ?>" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding no-margin">
                    <label>Contact Number</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?= $user['contact'] ?>" required>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding no-margin">
                    <label>Address</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <textarea class="form-control" name="address" placeholder="Address" rows="5" required><?= $user['address'] ?></textarea>
                    </div>
                    <label>City</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <input type="text" class="form-control" name="city" placeholder="City" value="<?= $user['city'] ?>" required>
                    </div>
                    <label>Post Code</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <input type="text" class="form-control" name="postcode" placeholder="Post Code" value="<?= $user['postcode'] ?>" required>
                    </div>
                    <label>Region / State</label>
                    <select name="state" class="form-control" required>
                        <option value=""> --- Please Select --- </option>
                        <option value="Johor" <?php if ($user['state'] == "Johor") {echo 'selected';}?>>Johor</option>
                        <option value="Kedah" <?php if ($user['state'] == "Kedah") {echo 'selected';}?>>Kedah</option>
                        <option value="Kelantan" <?php if ($user['state'] == "Kelantan") {echo 'selected';}?>>Kelantan</option>
                        <option value="Labuan" <?php if ($user['state'] == "Labuan") {echo 'selected';}?>>Labuan</option>
                        <option value="Melaka" <?php if ($user['state'] == "Melaka") {echo 'selected';}?>>Melaka</option>
                        <option value="Negeri Sembilan" <?php if ($user['state'] == "Negeri Sembilan") {echo 'selected';}?>>Negeri Sembilan</option>
                        <option value="Pahang" <?php if ($user['state'] == "Pahang") {echo 'selected';}?>>Pahang</option>
                        <option value="Perak" <?php if ($user['state'] == "Perak") {echo 'selected';}?>>Perak</option>
                        <option value="Perlis" <?php if ($user['state'] == "Perlis") {echo 'selected';}?>>Perlis</option>
                        <option value="Pulau Pinang" <?php if ($user['state'] == "Pulau Pinang") {echo 'selected';}?>>Pulau Pinang</option>
                        <option value="Sabah" <?php if ($user['state'] == "Sabah") {echo 'selected';}?>>Sabah</option>
                        <option value="Sarawak" <?php if ($user['state'] == "Sarawak") {echo 'selected';}?>>Sarawak</option>
                        <option value="Selangor" <?php if ($user['state'] == "Selangor") {echo 'selected';}?>>Selangor</option>
                        <option value="Terengganu" <?php if ($user['state'] == "Terengganu") {echo 'selected';}?>>Terengganu</option>
                        <option value="Wilayah Persekutuan" <?php if ($user['state'] == "Wilayah Persekutuan") {echo 'selected';}?>>Wilayah Persekutuan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary pull-right" style="margin-top:2.5%;">Edit Profile</button>
            </form>
        </div>  
        <!--Right Part End -->
        <div class="col-sm-6" id="content">
            <h1 class="title">My Orders</h1>
            <table id="data-table" class="table table-bordered table-hover data-table" style="background:#fff;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($order)) {
                        $i = 1;
                        foreach ($order as $row) {
                            ?>
                        <tr>
                        <td><?= $i ?></td>
                        <td><?= "#" . $row['order_id'] ?></td>
                        <td>
                            <ul class="no-bullet">
                                <?php
                                foreach ($row['products'] as $product_row) {
                                    ?>
                                <li><a href="<?= base_url()?>main/product/<?= $product_row['product_id']?>"><?= $product_row['name'] ?> x <?= $product_row['quantity']?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </td>
                        <td>RM<?= $row['total'] ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Total Price</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>