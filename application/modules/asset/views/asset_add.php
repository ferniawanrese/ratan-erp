	<form  id = "interview_add" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
							  
			<div class="form-group">
				<label  class="col-sm-3 control-label">Asset Name :</label>
				<div class="control col-md-4">
					<input name="asset_name"  id = "asset_name" class="form-control " type="text"/> 
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Product :</label>
				<div class="control col-md-4">
					<input id = "product_namex"  class="form-control product_namex" type="text" value = ""/>
					<input id = "product_name" name="product_name"  class = "product_name" type="hidden"  />
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Department :</label>
				<div class="control col-md-4">
					<select class = "form-control" id = "sdepartment_ID" name = "sdepartment_ID">
								<option value = "-1">-- Choose Department --</option>
						<?php foreach($department_data as $dep):?>
							<?php if($dep['department_parentID'] == '0'):?>
								<option value = "<?php echo  $dep['department_ID'];?>"><?php echo  $dep['department_name'];?></option>
							<?php else:?>
								<option value="<?php echo  $dep['department_ID'];?>"><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
							<?php endif;?>										
						<?php endforeach;?>	 
					 </select>
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Responsible Employee  :</label>
				<div class="control col-md-4">
					<input id = "employee_managerName_dep" name="employee_managerName_dep" class="form-control employee_managerName_dep" type="text" value = ""/>
					<input id = "manager_ID" name="manager_ID"  class = "manager_ID" type="hidden"  />
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Location  :</label>
				<div class="control col-md-4">
					<input id = "employee_managerName_dep" name="employee_managerName_dep" class="form-control employee_managerName_dep" type="text" value = ""/>
					<input id = "manager_ID" name="manager_ID"  class = "manager_ID" type="hidden"  />
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Note  :</label>
				<div class="control col-md-4">
					<textarea class = "form-control" id = "note">asd</textarea>
				</div>
			</div>
			  
			<div class="form-group">
				<label  class="col-sm-3 control-label"> </label>
				<div class="control col-md-4">
					<button class="alert-box btn" type = "submit" >Finish</button>
				</div> 
			</div>
						
</form>