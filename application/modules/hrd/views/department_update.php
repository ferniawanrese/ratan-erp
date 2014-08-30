<form  id = "depAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_update_action/');?>" method="post">
						
						<input name="department_ID"  id = "department_ID"   type="hidden"  value = "<?php echo $dat[0]['department_ID'];?>" />
						<div class="form-group">
							<label  class="col-sm-3 control-label">Department Name :</label>
							<div class="control col-md-4">
								<?php if($dat[0]['department_parentID'] ==0):?>
									<input name="department_Name"  id = "department_Name" class="form-control " type="text" placeholder = "Update Department" value = "<?php echo $dat[0]['department_name'];?>" />
								 <?php else:?>
									<select class = "form-control" id = "department_parentID" name = "department_parentID">
										<option value="-1">--Choose Parent--</option>
									<?php foreach ($parent as $parents):?>
									<?php if($dat[0]['department_parentID']==$parents['department_ID']){$selected = "selected";}else{$selected="";};?>
										<option value="<?php echo $parents['department_ID'];?>" <?php echo $selected;?>><?php echo $parents['department_name'];?></option>
									<?php endforeach;?>
									</select>
								<?php endif;?>
						</div>
						</div>
						<?php if($dat[0]['department_parentID'] !=0):?>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Child :</label>
							<div class="control col-md-4">
								<input name="department_Name"  id = "department_Name" class="form-control " type="text"  value = "<?php echo $dat[0]['department_name'];?>"  /> 
							</div>
						</div>
						<?php endif;?>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Manager Name:</label>
							<div class="control col-md-4">
								<input id = "employee_managerName" name="employee_managerName" class="form-control employee_managerName" type="text" value = "<?php echo $dat[0]['employee_name'].'/'.$dat[0]['employee_badge'];?>"/>
								<input id = "manager_ID" name="manager_ID"   type="hidden" value = "<?php echo $dat[0]['employee_ID'];?>"/>
							</div>
						</div>
						
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

$("form#depAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/department_update_action/');?>",
				data: $("#depAdd").serialize(),
				success: function(data)
				{
					display_data();
					$('#myModal').modal('hide');
				}
			});
			
			return false;
	});
	
	$(function() {
		$( ".employee_managerName" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee_managerName').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID; 
				$("#manager_ID").val(id);
				}  
		}); 
	}); 
</script> 