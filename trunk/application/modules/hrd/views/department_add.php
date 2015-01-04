<form  id = "depAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
							 
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Department Name :</label>
							<div class="control col-md-4">
								<input name="parent_new"  id = "parent_new" class="form-control " type="text" placeholder = "New Departmen"  style="display:none" />
								 
								<select class = "form-control" id = "parent" name = "parent">
									
								<?php foreach ($parent as $parents):?>
									<option value="<?php echo $parents['department_ID'];?>"><?php echo $parents['department_name'];?></option>
								<?php endforeach;?>
								
								<?php if(!$parent):?>
								<script>
								$('#parent_new').show();
								</script>
								<?php endif;?>
								
								<option value="-1">+ Add new department </option>
								</select>
						</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Division Name :</label>
							<div class="control col-md-4">
								<input name="child"  id = "child" class="form-control " type="text"    /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">Manager Name:</label>
							<div class="control col-md-4">
								<input id = "employee_managerName_dep" name="employee_managerName_dep" class="form-control employee_managerName_dep" type="text" value = ""/>
								<input id = "manager_ID" name="manager_ID"  class = "manager_ID" type="hidden"  />
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
  //$('#parent_new').attr("disabled", true);
  $('#parent_new').hide();
  }else{
 // $('#parent_new').attr("disabled", false);
   $('#parent_new').show();
  }
});

$("form#depAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/department_add_action/');?>",
				data: $("#depAdd").serialize(),
				success: function(data)
				{ 

					$('#myModal').modal('hide'); 
					what_next(); 
				}
			});
			
			return false;
	});
	  
	$(function() {
		$( ".employee_managerName_dep" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee_managerName_dep').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID; 
				$(".manager_ID").val(id); 
				}  
				
		}); 
	}); 
</script> 