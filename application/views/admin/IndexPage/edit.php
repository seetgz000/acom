<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Edit Index Picture
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="indexPic_form" method="POST" action="<?php echo site_url("IndexPage/edit/" . $indexPic['index_pic_id']); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Thumbnail</label>
                                    <img class="img-responsive" src="<?= base_url() . $indexPic['thumbnail'] ?>">
                                    <input type="file" class="form-control" name="thumbnail" id="form_thumbnail">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Caption</label>
                                    <input type="text" class="form-control" required name="caption" placeholder="Caption" id="form_caption" value="<?php echo $indexPic['caption']; ?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Link</label>
                                    <div class="form-inline">
                                        <input type="text" class="form-control" required name="base_link" id="base_link" value="<?php echo base_url(); ?>" disabled>
                                        <input type="text" class="form-control" required name="link" placeholder="Link" id="form_link" value="<?php echo $indexPic['link']; ?>">
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <input type="submit" class="btn btn-flat btn-info pull-right" value="edit">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function form_submit(form) {
        var data = new FormData(form);
    var url = $(form).attr("action");
        $.ajax({
            url: url,
            data: data,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                if (data.status) {
                    $("body").loadingModal({
                        text: "Successfully updated"
                    });
                    setTimeout(function () {
                        window.location = "<?= site_url('IndexPage'); ?>";
                    }, 1500);
                } else {
                    $(".user_form_alert").html(data.message);
                    $(".user_form_alert").removeClass("hidden");
                }
            },
            dataType: "JSON"
        });
    }
    $(document).ready(function () {
        var indexPic_form = document.getElementById("indexPic_form");
        indexPic_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(indexPic_form);
        });
        var basic_elements = ["form_thumbnail", "form_caption", "form_link"];
        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }
    });
</script>