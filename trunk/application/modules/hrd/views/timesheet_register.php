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
										
										<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_timesheet()"> Create</button>
												<!--<button class="btn btn-inverse btn-large icon-file-alt" type="button" onclick = "exportdata()"> Export to Excel</button>-->
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
											</div>
											
											<div   id = "btn-list" class="form-group">
												<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
											</div>
										 
										<span  id ="search" style = "display: none;">	
											<!-- searching -->
											 <form id = "form_filter" name="form_filter" method="post">
												<fieldset class="default panel">
														<legend> Filter Timesheet </legend>
													
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-text"></label>
															<div   class="input-append datetimepicker4">
																<span class="add-on">
																<input id="register_date" name = "register_date" placeholder = "Register Date" class="form-control {validate:{required:true}}" type="text" data-format="dd/MM/yyyy">
																</span>
															</div>
														</div> 
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-text"></label>
															<div   class="input-append datetimepicker4">
																<span class="add-on">
																<input id="deadline_date" name = "deadline_date" placeholder = "Dealine Date" class="form-control {validate:{required:true}}" type="text" data-format="dd/MM/yyyy">
																</span>
															</div>
														</div> 
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<select class="form-control {validate:{required:true}}" name = "project_ID" id = "project_ID"> 
																	<option value = "" >-- Choose Project --</option>
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
																<select class="form-control {validate:{required:true}}" name = "task_ID" id = "task_ID">
																	<option value = "" >-- Choose Task --</option>
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
															<span class="add-on">
																<input id="ammount_expenses" class="form-control" type="text" placeholder="Ammount Billable" name="ammount_expenses"> 
															</span> 
														</div>
														 
														<div class="form-group col-sm-12 col-md-3"> 
															<div class="input-group col-sm-12 col-md-12">
																<span class = "btn-group">
																	<button type = "submit" class="btn btn-default"  > Search!</buttton>
																	<button type = "button" class="btn btn-default" onclick = "clearfilter()" > Clear Filter</buttton>
																</span>
															</div>
														</div>
														
													</fieldset>
											</form>	
										 </span>
										<div class = "list col-sm-12 col-md-12">
											<!-- content ajax -->											
										</div>
											
										</div> 
									</div>
						</div>
</div>			

<script>
function close_filter(){											
$("#search").fadeOut();
$("#Show").show();
$("#Hide").hide();
}
function open_filter(){											
$("#search").fadeIn();
$("#Hide").show();
$("#Show").hide();
}
 
display_data();

function display_data(){ 
	 $('#btn-list').hide();
	$('#btn-create').show();
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
 

function add_timesheet(){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/timesheet_add/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					$('body').loadie(1);
				}  
			});

}
</script>
	