 <form  id = "billing" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<input name="billing_ID"  id = "billing_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['billing_ID'];?>"  /> 	 
 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Billing Name :</label>
							<div class="control col-md-4">
								<input name="billing_name"  id = "billing_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['billing_name'];?>"  /> 
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Address :</label>
							<div class="control col-md-4">
								<textarea  id = "address" name = "address"class="form-control "><?php echo $dat[0]['address'];?></textarea> 
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
			
	
	$("form#billing").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('purchase/billing_add_action/');?>",
				data: $("#billing").serialize(),
				success: function(data)
				{
					
					 display_data();
					
				}
			});
			
			return false;
	});
			
</script>