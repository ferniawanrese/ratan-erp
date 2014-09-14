<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
						<input name="project_ID"  id = "project_name" class="form-control " type="hidden"  value = "<?php echo $dat[0]['project_ID'];?>"  /> 	 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Project Name:</label>
							<div class="control col-md-4">
								<input name="project_name"  id = "project_name" class="form-control " type="text"  value = "<?php echo $dat[0]['project_name'];?>"  /> 
							</div>
						</div>
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Department:</label>
							<div class="control col-md-4"> 
								<select class = "form-control" id = "department_ID" name = "department_ID"> 
									<?php foreach ($department_data as $keys):?>
									<option value="<?php echo $keys['department_ID'];?>"><?php echo $keys['department_name'];?></option>
									<?php endforeach;?>
									<option value="-1">+ Add Department</option>
								</select>
							</div>
						</div> 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Status:</label>
							<div class="control col-md-4"> 
								<select class = "form-control" id = "status" name = "status"> 
									<option  >active</option>
									<option  >finish</option>									
									<option  >pending</option>
								</select>
							</div>
						</div> 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Billable :</label>
							<div class="control col-md-4">
								<input name="billable"  id = "billable" class="form-control " type="text"  value = "<?php echo $dat[0]['billable'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
						</div>
						
</form>
 

<script>
	$('#parent').on('change', function() {
	  var a= this.value;
	  if(a !=-1){
	   //  $('#parent_new').attr("disabled", true);
	  $('#parent_new').hide();
	  }else{
	  $('#parent_new').show(); 
	  }
	});
  
	$("form#catAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/project_add_action/');?>",
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