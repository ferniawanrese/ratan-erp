	<form  id = "jobAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
				<input name="job_ID"  id = "job_ID" class="form-control " type="hidden"  value = " "  /> 	 
				<div class="form-group">
					<label  class="col-sm-3 control-label">Department :</label>
					<div class="control col-md-4">
						 <select id = "department_ID" name="department_ID"  class="form-control"> 
								   
							</select>
					</div>
				</div> 
				<div class="form-group">
					<label  class="col-sm-3 control-label">Job Name :</label>
					<div class="control col-md-4">
						<input name="job_name"  id = "job_name" class="form-control " type="text"  value = " "  /> 
					</div>
				</div>
			
	</form>