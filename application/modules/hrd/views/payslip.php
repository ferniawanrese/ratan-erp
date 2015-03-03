<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class=" "> Payroll</li> 
	<li class=" "> Employee Payslip</li> 
</ul>

<div class="primary-head">
		<!--content-->
		<div class="row-fluid">
					<div class="content-widgets gray">
						<div class="widget-head blue clearfix">
						  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Employee Payslip </h3> 
						</div>
															
						<div class="well col-sm-12 col-md-12">
						
							<div  id = "btn-create" class="form-group">
								<!--<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "expends_add()"> Create</button> -->
								<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
								<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button> 
							</div>
							 
							<div   id = "btn-list" class="form-group">
								<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
							</div>
							 
						 
							<span  id ="search" style = "display: none;" class = "col-md-12">	
								<!-- searching -->
								 <form id = "form_filter" name="form_filter" method="post">
									<fieldset class="default panel">
											<legend> Filter Payslip </legend>
										 
											<div class="form-group col-sm-12 col-md-3">  
											<label for="validate-text"></label>
												<div class="input-group col-sm-12 col-md-12">
													<input   class="form-control" type="text" placeholder="Employee Name" name="filter[description]" id = "description"> 
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
							
							<span class = "col-md-12" >	
								<!-- searching -->
								 
									<fieldset class="default panel">
											<legend> Payslip Period</legend>
											 
											<div class="form-group col-sm-12 col-md-3">  
											<label for="validate-text"></label>
												<div class="input-group col-sm-12 col-md-12">
													<input   class="form-control datepicker" type="text" placeholder="Date Start" name="date_start" id = "date_start"> 
												</div> 
											</div>
											  
											<div class="form-group col-sm-12 col-md-3">  
											<label for="validate-text"></label>
												<div class="input-group col-sm-12 col-md-12">
													<input   class="form-control datepicker" type="text" placeholder="Date End" name="date_end" id = "date_end"> 
												</div> 
											</div>
											 
											<div class="form-group col-sm-12 col-md-3"> 
												<label for="validate-number"></label>
												<div class="input-group col-sm-12 col-md-12">
													<span class = "btn-group">
														<button   class="btn btn-warning"  style = "display:none" id = "generate" onclick = "recalculate()"> Recalculate</buttton>
													</span>
												</div>
											</div>
											 
										</fieldset>
							 
							</span>
						<div class = "list col-sm-12 col-md-12">
							<!-- content ajax -->											
						</div>
							
						</div> 
					</div>
		</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class = "icon-remove"></i></button>
				<h1><span id = "modal_label">Some Field Required ! </span></h1>
			</div>
			<div class="modal-body" id = "modal_body">
			Please choose date range 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --> 		
 
<script>

display_data();

function display_data(){ 

	NProgress.inc();
	$('#btn-list').hide();
	$('#btn-create').show();
	$('#generate').hide();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/payslip_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
				}			
			});

}


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


function payslip_add(a){

	if($('#date_start').val() =="" || $('#date_end').val()==""){
	
	$('#myModal').modal('show');
	return false;
	}
	 
	$('#search').hide();
	$('#btn-list').show();
	$('#generate').show();
	$('#btn-create').hide();
	NProgress.inc();
	$.ajax({
				
				url: "<?php echo base_url('hrd/payslip_add/');?>"+"/"+a,
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}


$('#date_end').datepicker({
  format:"dd-mm-yyyy"
});  

$('#date_start').datepicker({
  format:"dd-mm-yyyy"
});  


</script>