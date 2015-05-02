 <form  id = "vendor" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<input name="vendor_ID"  id = "vendor_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['vendor_ID'];?>"  /> 	 
 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Vendor Name :</label>
							<div class="control col-md-4">
								<input name="vendor_name"  id = "vendor_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['vendor_name'];?>"  /> 
							</div>
						</div>
					 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Contact Person :</label>
							<div class="control col-md-4">
								<input name="contact_person"  id = "contact_person" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['contact_person'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Email :</label>
							<div class="control col-md-4">
								<input name="email"  id = "email" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['email'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Fax :</label>
							<div class="control col-md-2">
								<input name="fax"  id = "fax" class="form-control  " type="text"  value = "<?php echo $dat[0]['fax'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Phone :</label>
							<div class="control col-md-2">
								<input name="phone"  id = "phone" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['phone'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Address :</label>
							<div class="control col-md-4">
								<textarea  id = "address" name = "address"class="form-control "><?php echo $dat[0]['address'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Website :</label>
							<div class="control col-md-4">
								<input name="website"  id = "website" class="form-control  " type="text"  value = "<?php echo $dat[0]['website'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Postcode :</label>
							<div class="control col-md-2">
								<input name="poscode"  id = "poscode" class="form-control  " type="text"  value = "<?php echo $dat[0]['poscode'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Description :</label>
							<div class="control col-md-4">
								<textarea  id = "description" name = "description"class="form-control "><?php echo $dat[0]['description'];?></textarea> 
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
			
	
	$("form#vendor").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('asset/vendor_add_action/');?>",
				data: $("#vendor").serialize(),
				success: function(data)
				{
					
					 display_data();
					
				}
			});
			
			return false;
	});
			
</script>