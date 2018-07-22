<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Add Terms And Conditions
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="project_form" method="POST" action="<?php echo site_url("TermAndCondition/add"); ?>">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Term And Condition</label>
                                    <input type="text" class="form-control" required name="term_and_condition_header" placeholder="Header" id="form_header">
									<hr />
									<div id="descriptionArea">
									<label id="addDescription" class='btn btn-flat btn-info pull-right'>+</label>								
									</div>
								</div>
                            </div>
                            <br/>
                            <input type="submit" class="btn btn-flat btn-info pull-right" value="add">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>

	function postTermAndCondition(description)
	{
		var url = $("#project_form").attr("action");
		
		var newTermAndConditionObject = {
				"term_and_condition_header":$("#form_header").val().trim(),
				"term_and_condition_description":description,
				};
				
		var newTermAndConditionString = JSON.stringify(newTermAndConditionObject);
		
		var fd = new FormData();
		fd.append('newTermAndConditionString',newTermAndConditionString);

		$.ajax({
			url: url,
			data: fd,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data){
				if (data.status) {
                    $("body").loadingModal({
                        text: "Successfully added"
                    });
                    setTimeout(function () {
                        window.location = "<?= site_url('TermAndCondition'); ?>";
                    }, 1500);
                } else {
                    $(".user_form_alert").html(data.message);
                    $(".user_form_alert").removeClass("hidden");
                }
			},
			dataType: "JSON"
		});	
	}
	
	function validateData(numOfDescription)
	{
		var description = [];
		for(var i=1 ; i<=numOfDescription ;i++)
		{
			if($("#form_description"+i).val().length > 0)
			{
				description.push($("#form_description"+i).val().trim());
			}		
								
		}
		if(description.length <= 0)
		{
			description.push(" ");
		}
				
		postTermAndCondition(description)
	}
	
	function form_submit(numOfDescription) 
	{
		validateData(numOfDescription)
    }
	
    $(document).ready(function () {
		var numOfDescription = 1;
		$( "#descriptionArea" ).append("<input type='text' class='form-control description' required name='term_and_condition_description' placeholder='Description' id='form_description"+numOfDescription+"'><br />");
			
        var project_form = document.getElementById("project_form");

        project_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(numOfDescription);
        });

        var basic_elements = ["form_header","form_description"+numOfDescription];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

		$("#addDescription").click(function(){
			numOfDescription = numOfDescription + 1;
			$( "#descriptionArea" ).append("<input type='text' class='form-control description' name='term_and_condition_description' placeholder='Description' id='form_description"+numOfDescription+"'><br />");
			
		});
		
    });
		

</script>