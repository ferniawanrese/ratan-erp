<form  id = "productAdd" class="form-horizontal form-validate" enctype="multipart/form-data" >
						<input name="product_ID"  id = "product_ID" class="form-control " type="hidden"  value="<?php echo $product_data[0]['product_ID'];?>"  /> 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Barcode :</label>
							<div class="control col-md-4"> 
								<input name="product_code" id = "product_code" class="form-control  {validate:{required:false,user_barcode:true}}" type="text" value = "<?php echo $product_data[0]['product_code'];?>" />
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Product Name :</label>
							<div class="control col-md-4">
								<input name="product_name"  id = "product_name" class="form-control {validate:{required:true}}" type="text" value="<?php echo $product_data[0]['product_name'];?>"   /> 
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Description:</label>
							<div class="control col-md-4">
								<textarea class = "form-control" id = "product_desc" name = "product_desc"><?php echo $product_data[0]['product_desc'];?></textarea>
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-3 control-label">UoM :</label>
							<div class="control col-md-4">
								<span class = "input-group  "> 
								<select class = "form-control" id = "UoM_ID" name = "UoM_ID">
									<?php foreach($uom as $uom):?>
									<?php if($uom['UoM_ID'] == $product_data[0]['UoM_ID']){$select="selected=selected";}else{$select="";};?> 
									<option value="<?php echo $uom['UoM_ID'];?>" <?php echo $select;?>><?php echo $uom['uom_name'];?></option>
									<?php endforeach;?>
								</select>
									<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_uom()"></i>
									</span>
								</span>
							</div>
						</div>
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div>
							 
						</div>
						
</form>

<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">

<script>
document.getElementById('product_code').focus(); 

$('#validate_error').val('0'); //wawan 
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

$("form#productAdd").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/product_add_action/');?>",
				data: $("#productAdd").serialize(),
				success: function(data)
				{  
					$('#myModal').modal('hide'); 
					what_next_product(); 
				}
			});
			
			return false;
	});
	 
	$("#product_code").focusout(function(){
		var container = $('div.error-container ');
		$(".form-validate").validate({
                    errorContainer: container,
                    errorLabelContainer: $("ol", container),
                    wrapper: 'span',
                    meta: "validate"
                });
		 
	})
</script>