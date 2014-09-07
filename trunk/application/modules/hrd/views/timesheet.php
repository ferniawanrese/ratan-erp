<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class=" "> Time Tracking</li>
	<li class="active">My Timesheet</li>
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">My Timesheet </h3>
											
										</div>
																			
										<div class="well col-sm-12 col-md-12">
										
										<div  id = "btn-create" class="form-group"> 
											<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
											<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
										</div>
										<span  id ="search" style = "display: none;">
										<form id = "form_filter" action ="<?php echo base_url('hrd/hrd_save_employee/');?>" method="post">
											<fieldset class="default panel">
													<legend>Filtering </legend>
												
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<input id="employee_name" class="form-control" type="text" placeholder="Register Date" name="filter[employee_name]">
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<select class="form-control">
																<option val = "" >-- Choose Project --</option>
															</select>
															<span class="input-group-addon ">
															<i class="icon-plus" style="cursor:pointer;" title="Ascending"></i>
															</span>
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<select class="form-control">
																<option val = "" >-- Choose Task --</option>
															</select>
															<span class="input-group-addon ">
															<i class="icon-plus" style="cursor:pointer;" title="Ascending"></i>
															</span>
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<input id="employee_name" class="form-control" type="text" placeholder="Employee Name" name="filter[employee_name]">
														</div>
													</div>
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<input id="employee_name" class="form-control" type="text" placeholder="Notes " name="filter[employee_name]"> 
														</div>
													</div> 
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<span class="btn-group">
															<button class="btn btn-default" type="submit"> Search! </button>
															<button class="btn btn-default" onclick="clearfilter()" type="button"> Clear Filter </button>
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
display_data();

function display_data(){ 
	 
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					$('.my_loadie_container').loadie(1);
				}			
			});

}
</script>
	

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
</script>