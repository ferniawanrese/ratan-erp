 
	<form  id = "form_add" class="form-horizontal form-validate"   method="post"> 
				<div class="form-group">
					<label  class="col-sm-3 control-label">Start Date :</label>
					<div class="control col-md-3">
						<div id="datetimepicker4" class="input-append datetimepicker">
								<span class="add-on">
									<input data-format="dd-MM-yyyy hh:mm:ss" type="text" class = "form-control" id = "register_date" name = "register_date" value = "<?php echo $timesheet_detail[0]['register_date'];?>"> 
								</span>	
						</div>		 
					</div>		 
				</div> 
				<div class="form-group">
					<label  class="col-sm-3 control-label">Dead Line :</label>
					<div class="control col-md-3">
						<div id="datetimepicker4" class="input-append datetimepicker">
								<span class="add-on">
								<input data-format="dd-MM-yyyy hh:mm:ss" type="text" class = "form-control" id = "deadline" name = "deadline" value = "<?php echo $timesheet_detail[0]['deadline'];?>">
								</span>																	
						</div>																												
					</div>	 
				</div> 
				<div class="form-group">
					<label  class="col-sm-3 control-label"> Department:</label>
						<div class="control col-md-4">
								 <select id = "department_ID" name="department_ID"  class="form-control"> 
										<option >-- Choose Department --</option>
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
					<label  class="col-sm-3 control-label">Project  :</label>
					<div class="control col-md-4">
						<span class = "input-group  "> 
							<select id = "project_IDx" name="project_ID"  class="form-control "> 
								<option  value="">-- Choose Project --</option>  
							</select>
							<span class="input-group-addon ">
							<i class="icon-plus " onclick="add_project()" data-target="#myModal" data-toggle="modal" title="Add Project" style="cursor:pointer;"></i>
							</span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-3 control-label">Task :</label>
					<div class="control col-md-4">
						<span class = "input-group  "> 
							<select   id = "task_IDx" name = "task_ID" class="form-control {validate:{required:true}}"> >
								<option value="">-- Choose Task --</option>
							</select>
							<span class="input-group-addon ">
							<i class="icon-plus " onclick="add_task()" data-target="#myModal" data-toggle="modal" title="Add Task" style="cursor:pointer;"></i>
							</span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-3 control-label">Amount Expense :</label>
					<div class="control col-md-4">
						<input name="ammount_expenses"  id = "ammount_expenses" class="form-control " type="text"  placeholder="0.00"  value = "<?php echo $timesheet_detail[0]['ammount_expenses'];?>" /> 
					</div>
				</div> 
				<div class="form-group">
					<label  class="col-sm-3 control-label">Employees :</label>
					<div class="control col-md-9">
							<select id = "employee_name_opt" name = "employee_name_opt" data-placeholder="Employee Name " multiple class="chzn-select form-control" tabindex="8"> 
							</select> 
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-3 control-label">Note :</label>
					<div class="control col-md-4">
						<textarea class = "form-control {validate:{required:true}}" id = "description" name = "description" ><?php echo $timesheet_detail[0]['description'];?></textarea> 
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-3 control-label"> </label>
					<div class="control col-md-4">
						<input type="submit" class = "btn btn-default" value = "Submit">
					</div>
				</div>
				
	</form>
	 
<!-- dialog contents on hidden div -->   
 
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class = "icon-remove"></i></button>
					<h1><span id = "modal_label"></span></h1>
				</div>
				<div class="modal-body" id = "modal_body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	
	
<script type="text/javascript">
            
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
			
	$( "select#department_ID" ).change(function() {
	
		var a = $('select#department_ID option:selected').val();
	
			$.ajax({
				  url: "<?php echo base_url('hrd/get_employee_department');?>"+"/"+a,
				  
				  success: function( data ) {    		
				
					var jsonData = JSON.parse(data);
					
						optmin = "";
						liopmin = "";
						for (var i = '0'; i < jsonData.employee_name.length; i++) {
							var datanya = jsonData.employee_name[i];
							 
									optmin += "<option value ='"+ datanya.employee_ID +"'>"+ datanya.value +"</option>";
									liopmin += '<li class="active-result"  >' + datanya.value + '</li>';
									
							$('ul.chzn-results').html(liopmin);  
												
							$( "#employee_name_opt" ).html(optmin); 
							
							$(".chzn-select").trigger("liszt:updated"); 
						}
				  }
				});
		 
		$.ajax({
			
			url: "<?php echo base_url('hrd/get_project_detail/');?>" + '/' +a,
			 
			success: function (data) {
			 
			$( "#project_IDx" ).html("<option value = ''>-- Choose Project --</option>");
			
			var jsonData = JSON.parse(data);
			 
				optmin = "<option value = ''>-- Choose Project --</option>";
				for (var i = '0'; i < jsonData.projectnya.length; i++) {
					var datanya = jsonData.projectnya[i];
						
							optmin += "<option value ='"+ datanya.project_ID +"'>"+ datanya.project_name +"</option>";
										
					$( "#project_IDx" ).html(optmin); 
				}
				
			}
		});
		
	});

	$( "select#project_IDx" ).change(function() {
		
		var a = $('select#project_IDx option:selected').val();
		 
		$.ajax({
			
			url: "<?php echo base_url('hrd/get_task_detail/');?>" + '/' +a,
			 
			success: function (data) {
			
			
			$( "#task_IDx" ).html("<option value = ''>-- Choose Task --</option>");
			var jsonData = JSON.parse(data);
			 
				optmin = "<option value = ''>-- Choose Task --</option>";
				for (var i = '0'; i < jsonData.tasknya.length; i++) {
					var datanya = jsonData.tasknya[i];
					
					if(datanya.task_ID > '0'){
						
							optmin += "<option value ='"+ datanya.task_ID +"'>"+ datanya.task_name +"</option>";
							
					}
											
					$( "#task_IDx" ).html(optmin); 
				}
				
			}
		});
		
	});

	$("form#form_add").submit(function(e){
	
	//e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_addaction');?>",
				data: $("#form_add").serialize(),
				success: function(data)
				{
					display_data();
					$('body').loadie(1);
				}
			});
			
			return false;
	});

	
	$('.datetimepicker').datetimepicker({
            language: 'en',
			pickTime: true
        });
		 
		/*====Select Box====*/
	$(function () {
		$(".chzn-select").chosen();
		$(".chzn-select-deselect").chosen({
			allow_single_deselect: true
		});  
	}); 
 
 function add_project(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/project_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Project"); 		 
			}  
	 
	 })
 }
 
 function add_task(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/task_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Task"); 		 
			}  
	 
	 })
 }
 
 function add_department(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/department_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Department"); 		 
			}  
	 
	 })
 }
	 
</script>