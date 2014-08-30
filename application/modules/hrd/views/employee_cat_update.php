<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_update_action/');?>" method="post">
						<input name="employee_catID"  id = "employee_catID" class="form-control " type="hidden"  
									value = "<?php echo  $cat_detail[0]['employee_catID'];?>" /> 	 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Parent :</label>
							<div class="control col-md-4">
								<?php if($cat_detail[0]['employee_catParentID']==0):?>
									<input name="employee_catName"  id = "employee_catName" class="form-control " type="text" placeholder = "Update Parent"
									value = "<?php echo  $cat_detail[0]['employee_catName'];?>" /> 
								 <?php else:?>
									<select class = "form-control" id = "employee_catParentID" name = "employee_catParentID">
										<option value="-1">--Choose Parent--</option>
									<?php foreach ($parent as $parents):?>
										<?php if($cat_detail[0]['employee_catParentID']==$parents['employee_catID']){ $selected = "selected";}else{$selected = "";};?>
										<option value="<?php echo $parents['employee_catID'];?>" <?php echo $selected;?>><?php echo $parents['employee_catName'];?> </option>
										
									<?php endforeach;?>
									</select>
								<?php endif;?> 
							</div>
						</div> 
						<?php if($cat_detail[0]['employee_catParentID']!=0):?>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Child :</label>
							<div class="control col-md-4">
								<input name="employee_catName"  id = "employee_catName" class="form-control " type="text" value = "<?php echo $cat_detail[0]['employee_catName'];?>"   /> 
							</div>
						</div>
						<?php endif;?> 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Update</button>
							</div> 
						</div>
						
</form>

<script>
	$('#parent').on('change', function() {
	  var a= this.value;
	  if(a !=-1){
	  $('#parent_new').attr("disabled", true);
	  }else{
	  $('#parent_new').attr("disabled", false);
	  }
	});
  
	$("form#catAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/employee_cat_update_action/');?>",
				data: $("#catAdd").serialize(),
				success: function(data)
				{
					display_data();
					$('#myModal').modal('hide');
				}
			});
			
			return false;
	});
</script>