	<form  id = "customer" class="form-horizontal form-validate" enctype="multipart/form-data" method="post">
			<input name="partner_ID"  id = "partner_ID"   name = "partner_ID" type="hidden" value = "<?php echo $crm[0]['partner_ID'];?>"   />				  
			<div class="form-group">
							<label  class="col-sm-4 control-label">Customer Name :</label>
							<div class="control col-md-4">
								<input name="partner_name"  id = "partner_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $crm[0]['partner_name'];?>"  /> 
							</div>
						</div>
					 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Contact Person :</label>
							<div class="control col-md-4">
								<input name="contact_person"  id = "contact_person" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $crm[0]['contact_person'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Email :</label>
							<div class="control col-md-4">
								<input name="email"  id = "email" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $crm[0]['email'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Fax :</label>
							<div class="control col-md-2">
								<input name="fax"  id = "fax" class="form-control  " type="text"  value = "<?php echo $crm[0]['fax'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Phone :</label>
							<div class="control col-md-2">
								<input name="phone"  id = "phone" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $crm[0]['phone'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Address :</label>
							<div class="control col-md-4">
								<textarea  id = "address" name = "address"class="form-control "><?php echo $crm[0]['address'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Website :</label>
							<div class="control col-md-4">
								<input name="website"  id = "website" class="form-control  " type="text"  value = "<?php echo $crm[0]['website'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Postcode :</label>
							<div class="control col-md-2">
								<input name="postcode"  id = "postcode" class="form-control  " type="text"  value = "<?php echo $crm[0]['postcode'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Description :</label>
							<div class="control col-md-4">
								<textarea  id = "description" name = "description"class="form-control "><?php echo $crm[0]['description'];?></textarea> 
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
	
	$("form#customer").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('crm/customer_add_action/');?>",
				data: $("#customer").serialize(),
				success: function(data)
				{
					
					 display_data();
					
				}
			});
			
			return false;
	});
			
</script>
 