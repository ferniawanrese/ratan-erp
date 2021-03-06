<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Job Space</li> 
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"> Job Space</h3> 
										</div> 		
										<ul class="top-right-toolbar"> 
											<li><a href="" onclick="exportdata()"  class="brown" title="Export to excel"><i class="icon-download-alt"></i></a></li> 
											<li> </li> 
										</ul>
										<div class="well col-sm-12 col-md-12">
										
											<div  id = "btn-create" class="form-group">
												<!--<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_appraisal()"> Create</button>
												<button class="btn btn-inverse btn-large icon-file-alt" type="button" onclick = "exportdata()"> Export to Excel</button>
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>-->
											</div>
											
											<div   id = "btn-list" class="form-group">
												<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
											</div>
											
											<span  id ="search" style = "display: none;">	
											 
												<!-- searching -->
											 <form id = "form_filter" name="form_filter" method="post">
												
												<fieldset class="default panel">
												<legend> Filtering </legend>
											 
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-text"></label>
													<div class="input-group col-sm-12 col-md-12">
														<input type="text" class="form-control" id="employee_name" name="filter[employee_name]" placeholder="employee name" >	 
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

	NProgress.inc();
	$('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
		url:'<?php echo base_url('hrd/jobspace_data');?>',
		success: function(data){     
		 
					$( ".list" ).html(data); 		
					NProgress.done(true);
				} 
	})
}


function exportdata(){

window.open('<?php echo base_url('hrd/jobspace_data_excel');?>?'+$("#form_filter").serialize());
 
}

</script>
 