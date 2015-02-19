<form  id = "allowanceAdd" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<input name="allowance_ID"  id = "allowance_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['allowance_ID'];?>"  /> 	 
 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Allowance Name :</label>
							<div class="control col-md-4">
								<input name="allowance_name"  id = "allowance_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['allowance_name'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Description :</label>
							<div class="control col-md-4">
								<textarea  id = "allowance_desc" name = "allowance_desc"class="form-control "><?php echo $dat[0]['allowance_desc'];?></textarea> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Deducation  :</label>
							<div class="control col-md-2">
								<select class = "form-control" id ="deduction_stat" name = "deduction_stat">
									<option value = "0">No</option>
									<option value = "1">Yes</option>
								</select>
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
						</div>
						
</form>


<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">

<script>


	cek_validate();
			function cek_validate(){
				
				 var container = $('div.error-container ');
                // validate the form when it is submitted
                var validator = $(".form-validate").validate({
                    errorContainer: container,
                    errorLabelContainer: $("ol", container),
                    wrapper: 'span',
                    meta: "validate"
                });
				
                $(".cancel").click(function () {
                    validator.resetForm();
                });
			} 
			
	
	$("form#allowanceAdd").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/allowance_add_action/');?>",
				data: $("#allowanceAdd").serialize(),
				success: function(data)
				{
					
					 display_data();
					
				}
			});
			
			return false;
	});
			
</script>