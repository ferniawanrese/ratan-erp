<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
						<input name="task_ID"  id = "task_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['task_ID'];?>"  /> 	 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Task Name:</label>
							<div class="control col-md-4">
								<input name="task_name"  id = "task_name" class="form-control " type="text"  value = "<?php echo $dat[0]['task_name'];?>"  /> 
							</div>
						</div>
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Job:</label>
							<div class="control col-md-4"> 
								<select class = "form-control" id = "job_ID" name = "job_ID"> 
									<?php foreach ($job_data as $keys):?>
									<option value="<?php echo $keys['job_ID'];?>"><?php echo $keys['job_name'];?></option>
									<?php endforeach;?>
									<option value="-1">+ Add Jobs</option>
								</select>
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
				url: "<?php echo base_url('hrd/task_add_action/');?>",
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