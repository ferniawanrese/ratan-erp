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
										<ul class="top-right-toolbar"> 
											<li><a href="" onclick="exportdata()"  class="brown" title="Export to excel"><i class="icon-download-alt"></i></a></li> 
											<li> </li> 
										</ul>										
										<div class="well col-sm-12 col-md-12">
										 
										<span  id ="search"  >
										<form id = "form_filter" action ="<?php echo base_url('hrd/hrd_save_employee/');?>" method="post">
										    
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<input id="description" class="form-control" type="text" placeholder="Notes " name="filter[description]"> 
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
	 NProgress.inc();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
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
 
	$("form#form_filter").submit(function(e){
	NProgress.inc();
	e.preventDefault();
		
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					NProgress.done(true);
				}
			});
			
			return false;
	});
	
function clearfilter(){
$('#description').val('');
display_data();

}

 function exportdata(){

window.open('<?php echo base_url('hrd/timesheet_data_excel');?>?'+$("#form_filter").serialize());
 
}
</script>