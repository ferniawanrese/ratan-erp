<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
						  
						<?php if(!isset($project_ID)):?>
						
						<input name="task_ID"  id = "task_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['task_ID'];?>"  /> 	
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Department:</label>
								<div class="control col-md-4">
										 <select id = "department_ID" name="department_ID"  class="form-control {validate:{required:true}} "> 
												<option value = "">-- Choose Department --</option>
													<?php foreach($department_data as $dep):?>
													<?php if($dep['department_ID']==$dat[0]['department_ID']){$selected = "selected";}else{$selected = "";}?>
														<?php if($dep['department_parentID'] == '0'):?>
															<option value = "<?php echo  $dep['department_ID'];?>" <?php echo $selected;?>><?php echo  $dep['department_name'];?></option>
														<?php else:?>
															<option value="<?php echo  $dep['department_ID'];?>"  <?php echo $selected;?>><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
														<?php endif;?>	
														
													<?php endforeach;?>	  
											</select>
									</div>
						</div> 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Project Name:</label>
							<div class="control col-md-4"> 
								<select class="form-control {validate:{required:true}}" id = "project_ID" name = "project_ID"> 
								 
									<option value="">-- Choose Project --</option>
								 
								</select>
							</div>
						</div> 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Task Name :</label>
							<div class="control col-md-4">
								<input name="task_name"  id = "task_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['task_name'];?>"  /> 
							</div>
						</div>
						
						<?php else:?>
						 
								<input name="project_ID"  id = "project_ID" class="form-control " type="hidden"  value = "<?php echo $project_ID;?>"  /> 
								
								 <div class="form-group">
									<label  class="col-sm-3 control-label"> Task Name :</label>
									<div class="control col-md-4">
										<input name="task_name"  id = "task_name" class="form-control {validate:{required:true}}"  type="text"  value = ""  /> 
									</div>
								</div>
						 
						<?php endif;?> 
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
						</div>
						
</form>

<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">

<script>

	$( "select#department_ID" ).change(function() {
	
		var a = $('select#department_ID option:selected').val();
	
			$.ajax({
				
				url: "<?php echo base_url('hrd/get_project_detail/');?>" + '/' +a,
				 
				success: function (data) {
				 
				$( "#project_ID" ).html("<option value = ''>-- Choose Project --</option>");
				
				var jsonData = JSON.parse(data);
				 
					optmin = "<option value = ''>-- Choose Project --</option>";
					for (var i = '0'; i < jsonData.projectnya.length; i++) {
						var datanya = jsonData.projectnya[i];
							
								optmin += "<option value ='"+ datanya.project_ID +"'>"+ datanya.project_name +"</option>";
											
						$( "#project_ID" ).html(optmin); 
					}
					
				}
			});
	});
	
	$('#parent').on('change', function() {
	  var a= this.value;
	  if(a !=-1){
	   //  $('#parent_new').attr("disabled", true);
	  $('#parent_new').hide();
	  }else{
	  $('#parent_new').show(); 
	  }
	});
	
	
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
			
  
	$("form#catAdd").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/task_add_action/');?>",
				data: $("#catAdd").serialize(),
				success: function(data)
				{
					what_next3();
					$('#myModal').modal('hide');
				}
			});
			
			return false;
	});
	 
</script>