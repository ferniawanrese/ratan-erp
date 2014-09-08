<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class=" "> Time Tracking</li>
	<li class="active">Register Time</li>
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Register Time </h3>
											
										</div>
																			
										<div class="well col-sm-12 col-md-12">
										
										<form id = "form_add" action ="<?php echo base_url('hrd/timesheet_add/');?>" method="post">
											<fieldset class="default panel">
													<legend> Add New Timesheet </legend>
												
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div id="datetimepicker4" class="input-append ">
															<span class="add-on">
															<input id="register_date" name = "register_date" placeholder = "Register Date" class="form-control" type="text" data-format="dd/MM/yyyy">
															</span>
														</div>
													</div> 
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<select class="form-control" name = "project_ID" id = "project_ID"> 
																<option val = "-1" >-- Choose Project --</option>
																<?php foreach($project as $projects):?>
																<option value = "<?php echo $projects['project_ID'];?>"><?php echo $projects['project_name'];?></option>
																<?php endforeach;?>
															</select>
															<span class="input-group-addon ">
															<i class="icon-plus" style="cursor:pointer;" title="Ascending"></i>
															</span>
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<select class="form-control" name = "task_ID" id = "task_ID">
																<option val = "-1" >-- Choose Task --</option>
																<?php foreach($task as $tasks):?>
																<option value = "<?php echo $tasks['task_ID'];?>"><?php echo $tasks['task_name'];?></option>
																<?php endforeach;?>
																
															</select>
															<span class="input-group-addon ">
															<i class="icon-plus" style="cursor:pointer;" title="Ascending"></i>
															</span>
														</div>
													</div>
													  		
													<div class="form-group col-sm-12 col-md-3"> 
														<label for="validate-text"></label>
														<div >
														 
															<input id = "employee_name" placeholder="Employee Name" name="employee_name" class="form-control employee_name" type="text" value = ""/>
															<input id = "employee_ID" name="employee_ID" class="form-control employee_ID" type="hidden" value = " "/>
														 
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3"> 
														<div  >
														<span class="add-on">
															<input id="ammount_expenses" class="form-control" type="text" placeholder="Ammount Billable" name="ammount_expenses"> 
														</span>
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-1"> 
														<div class="input-group col-sm-12 col-md-12">
															<input id="ammount_timeH" class="form-control" type="text" placeholder="HH" name="ammount_timeH" size = "5"> 
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-1"> 
														<div class="input-group col-sm-12 col-md-12">
															<input id="ammount_timeM" class="form-control" type="text" placeholder="mm" name="ammount_timeM" size = "5"> 
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-12"> 
														<div class="input-group col-sm-12 col-md-12">
															 <textarea class="form-control" placeholder = "Notes" id = "description" name = "description"></textarea>
														</div>
													</div>
													<div class="form-group col-sm-12 col-md-3"> 
														<div class="input-group col-sm-12 col-md-12">
															<button class="btn btn-default" type="submit">Save</button>
														</div>
													</div>
													
												</fieldset>
										</form>	
										 
											<div class = "list col-sm-12 col-md-12">
												<!-- content ajax -->											
											</div>
											
										</div> 
									</div>
						</div>
</div>			


<script>
  
	$("form#form_add").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_add');?>",
				data: $("#form_add").serialize(),
				success: function(data)
				{
					display_data();
					$('body').loadie(1);
				}
			});
			
			return false;
	});


$(function() {
		$( ".employee_name" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee_name').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#employee_ID").val(id);
				}  
		}); 
	}); 


$('#datetimepicker4').datetimepicker({
            pickTime: false
        });
		
display_data();

function display_data(){ 
	 
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_registerdata/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					$('.my_loadie_container').loadie(1);
				}			
			});

}
</script>
	