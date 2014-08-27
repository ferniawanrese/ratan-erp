<form  id = "jobAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
							 
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Department :</label>
							<div class="control col-md-4">
								 <select id = "department_ID" name="department_ID"  class="form-control"> 
										<option >-- Choose Department --</option>
											<?php foreach($department_data as $dep):?>
												<?php if($dep['department_parentID'] == 0):?>
													<option value = "<?php echo  $dep['department_ID'];?>"><?php echo  $dep['department_name'];?></option>
												<?php else:?>
													<option value="<?php echo  $dep['department_ID'];?>"><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
												<?php endif;?>										
											<?php endforeach;?>	  
									</select>
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Job Name :</label>
							<div class="control col-md-4">
								<input name="job_name"  id = "job_name" class="form-control " type="text"    /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Job Description :</label>
							<div class="control col-md-4">
								<input name="job_desc"  id = "job_desc" class="form-control " type="text"    /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Job Requirement :</label>
							<div class="control col-md-6">
								<textarea class="form-control " id = "job_requirement" name = "job_requirement"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Job Expected Num Requirement :</label>
							<div class="control col-md-2">
								<input name="job_expected_requirement"  id = "job_expected_requirement" class="form-control " type="text"    /> 
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
	  $('#parent_new').attr("disabled", true);
	  }else{
	  $('#parent_new').attr("disabled", false);
	  }
	});
  
	$("form#jobAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/job_position_add_action/');?>",
				data: $("#jobAdd").serialize(),
				success: function(data)
				{
					display_data();
					$('#myModal').modal('hide');
				}
			});
			
			return false;
	});
</script>