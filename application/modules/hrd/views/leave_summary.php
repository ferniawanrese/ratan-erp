<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li> 
	<li class="active">Leaves</li>
	<li class="active">Leave Summary</li>
</ul>
  
<div class="primary-head">
		<!--content-->
		<div class="row-fluid">
					<div class="content-widgets gray">
						<div class="widget-head blue clearfix">
						  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Leave Summary   </h3>
						</div> 
						<ul class="top-right-toolbar"> 
							<li><a href="" onclick="exportdata()"  class="brown" title="Export to excel"><i class="icon-download-alt"></i></a></li> 
							<li> </li> 
						</ul>
						<div class="well col-sm-12 col-md-12">
						  
							<div  id = "btn-create" class="form-group"> 
									<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
									<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
							</div>
							 
							<div   id = "btn-list" class="form-group">
								<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
							</div>
							
							<span  id ="searchx" style = "display: none;">	
											<!-- searching -->
											 <form id = "form_filter" name="form_filter" method="post">
												<fieldset class="default panel">
														<legend> Filter Timesheet </legend>
													 
														<div class="form-group col-sm-12 col-md-2">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input type ="text" name ="date_start" id="date_start" class="form-control" placeholder="Start Date"> 
															</div> 
														</div>
														<div class="form-group col-sm-12 col-md-2">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input type ="text" name ="date_end" id="date_end" class="form-control" placeholder="End Date"> 
															</div> 
														</div>
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input   id = "employee" class="form-control employee {validate:{required:true}}" type="text"  placeholder = "Employee"  /> 
																<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"  value = ""   />
															</div>
														</div>
														 
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-email"></label>
															<div class="input-group col-sm-12 col-md-12" >
																<select class="form-control" name="limit" id="limit" >
																	<option value = "10">Limit 10</option>
																	<option value = "20">Limit 20</option>
																	<option value = "50">Limit 50</option>
																	<option value = "100">Limit 100</option>
																</select>
																 
															</div>
														</div>
														<div class="form-group col-sm-12 col-md-3"> 
															<label for="validate-number"></label>
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

$("form#form_filter").submit(function(e){
	
	e.preventDefault();
			NProgress.inc();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/leave_summary_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					NProgress.done(true);
				}
			});
			
			return false;
	});

display_data();
	function display_data(){ 
		$('#btn-list').hide();
		$('.btn-create').show();
		NProgress.inc();
		$.ajax({
					type: "POST",
					url: "<?php echo base_url('hrd/leave_summary_data/');?>",
					data: $("#form_filter").serialize(),
					success: function(data){     
						$( ".list" ).html(data); 								
						NProgress.done(true);
					}			
				});

	}
	
	function clearfilter(){
			
			$('#employee_ID').val('');
			$('#employee').val('');
			$('#date_start').val('');
			$('#date_end').val('');
			$('#search').val(''); 
			display_data();
	}
	
	
function close_filter(){	 
$("#searchx").hide();
$("#Show").show();
$("#Hide").hide();
}
function open_filter(){											
$("#searchx").fadeIn();
$("#Hide").show();
$("#Show").hide();
}


$('#date_end').datepicker({
  format:"dd-mm-yyyy"
});  

$('#date_start').datepicker({
  format:"dd-mm-yyyy"
});  


$(function() {
		$( ".employee" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#employee_ID").val(id);
				}  
		}); 
	}); 
	
</script>