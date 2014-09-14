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
										
										<form id = "form_add" action ="<?php echo base_url('hrd/timesheet_add/');?>" method="post" class="form-validate" >
											<fieldset class="default panel">
													<legend> Add New Timesheet </legend>
												
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
													 
													<!--<div class="form-group col-sm-12 col-md-3"> 
														<label for="validate-text"></label>
														<div >
														 
															<input id = "employee_name" placeholder="Employee Name" name="employee_name" class="form-control employee_name {validate:{required:true}}" type="text" value = ""/>
															<input id = "employee_ID" name="employee_ID" class="form-control employee_ID" type="hidden" value = " "/>
														 
														</div>
													</div>-->
													
													<div class="form-group col-sm-12 col-md-3">  
														<span class="add-on">
															<input id="ammount_expenses" class="form-control" type="text" placeholder="Ammount Billable" name="ammount_expenses"> 
														</span> 
													</div>
													
													<div class="form-group col-sm-12 col-md-3">  
															<input id="ammount_timeH" class="form-control" type="number" placeholder="Hours" name="ammount_timeH" size = "5">  
													</div>
													
													<div class="form-group col-sm-12 col-md-3">  
															<input id="ammount_timeM" class="form-control" type="number" placeholder="Minutes" name="ammount_timeM" size = "5">  
													</div>
													
													<div class="form-group col-sm-12 col-md-12"> 
															<div class="input-group col-sm-12 col-md-12">
																<select id = "employee_name_opt" data-placeholder="Employee Name, Department Name or Position Name" multiple class="chzn-select form-control" tabindex="8">
																	 
																</select>  
															</div>
													</div>	
													 
													<div class="form-group col-sm-12 col-md-12">  
															 <textarea class="form-control {validate:{required:true}}" placeholder = "Notes" id = "description" name = "description"></textarea> 
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
		/*====Select Box====*/
	$(function () {
		$(".chzn-select").chosen();
		$(".chzn-select-deselect").chosen({
			allow_single_deselect: true
		}); 
		$('.chzn-choices input').autocomplete({
			 	
			  source: function( request, response ) {
				$.ajax({
				  url: "<?php echo base_url('hrd/get_employee_name');?>"+"/"+request.term+"/",
				  dataType: "json",
				  beforeSend: function(){$('ul.chzn-results').empty();},
				  success: function( data ) {  
					response( $.map( data, function( item ) {   
					
						  $('.chzn-select').append('<option value = "'+ item.employee_ID +'">' + item.value + '</option>');					  
						  $('ul.chzn-results').append('<li class="active-result"  >' + item.value + '</li>');  
					      $(".chzn-select").trigger("liszt:updated");
						  
					}));
				  }
				});
			  }
			});
	});
</script>
		
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


$('.datetimepicker4').datetimepicker({
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
</script>
	