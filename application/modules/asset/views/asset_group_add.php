<form  id = "assetgroup" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<input name="asset_groupID"  id = "asset_groupID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['asset_groupID'];?>"  /> 	 
 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Asset Group Name :</label>
							<div class="control col-md-4">
								<input name="group_name"  id = "group_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['group_name'];?>"  /> 
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
 /*
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
*/		
	
	$("form#assetgroup").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('asset/asset_group_add_action/');?>",
				data: $("#assetgroup").serialize(),
				success: function(data)
				{					
					$('#myModal').modal('hide'); 
					what_next_asset_group(); 					
				}
			});
			
			return false;
	});
			
</script>