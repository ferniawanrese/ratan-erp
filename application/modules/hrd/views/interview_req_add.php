	<form  id = "interview_add" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
							  
			<div class="form-group">
				<label  class="col-sm-3 control-label">Deadline Date :</label>
				<div class="control col-md-4">
					<input name="child"  id = "child" class="form-control " type="text"    /> 
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Survey :</label>
				<div class="control col-md-4">
					<input id = "employee_managerName_dep" name="employee_managerName_dep" class="form-control employee_managerName_dep" type="text" value = ""/>
					<input id = "manager_ID" name="manager_ID"  class = "manager_ID" type="hidden"  />
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Interviewer :</label>
				<div class="control col-md-4">
					<input id = "employee_managerName_dep" name="employee_managerName_dep" class="form-control employee_managerName_dep" type="text" value = ""/>
					<input id = "manager_ID" name="manager_ID"  class = "manager_ID" type="hidden"  />
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Employee to Interview  :</label>
				<div class="control col-md-4">
					<input id = "employee_managerName_dep" name="employee_managerName_dep" class="form-control employee_managerName_dep" type="text" value = ""/>
					<input id = "manager_ID" name="manager_ID"  class = "manager_ID" type="hidden"  />
				</div>
			</div>
				<div class="form-group">
				<label  class="col-sm-3 control-label">Status :</label>
				<div class="control col-md-4"> 
						<select class = "form-control" id = "state" name = "state"> 
						<option value="-1">Draft </option>
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