
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Data</li>
					</ul>

					<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
							
										<div class="content-widgets gray">
											<div class="widget-head blue clearfix">
											  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"><i class="icon-th-list"></i> Employee Data </h3>
											</div>
											<div class="well col-sm-12 col-md-12">
												
												<!-- searching -->
												
												<div class="col-sm-6 col-md-6">
													<div class="input-group">
													  <input type="text" class="form-control" id ="search" name ="search" placeholder="Search..">
													  <span class="input-group-btn">
														<button class="btn btn-default" type="button">Go!</button>
													  </span>
													</div><!-- /input-group -->
												</div><!-- /.col-lg-6 -->

												<div class="input-append input-icon col-sm-4 col-md-4">

													<button class="btn btn-warning icon-plus" type="button" onclick = "add_employee()">Add Employee</button>

												</div>
												
												<!-- content ajax -->
												<div class = "list col-sm-12 col-md-12"></div>

											</div>
										</div>
			        			
						</div>
						<!--end content-->
					</div>
					
<script>
display_data();

function display_data(){

	$('.progress-bar').show();
	
	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_employe_data/');?>",
				success: function(data){     

					$( ".list" ).html(data); 
					$('.progress-bar').hide();
				}  
			});

}

function add_employee(){

	$('.progress-bar').show();

	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>",
				success: function(data){     

					$( ".list" ).html(data); 
					$('.progress-bar').hide();
				}  
			});

}
</script>