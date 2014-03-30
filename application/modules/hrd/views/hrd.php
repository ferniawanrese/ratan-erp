
		
			<!-- ALERT -->
			<div class = "alert_message">
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<i class="icon-exclamation-sign"></i><strong>Warning!</strong> For safety reason, please change your password periodicly.</div>
			</div>
			
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Human Resource</h3>
						
						<div class="progress progress-striped active">
						  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
							<span class="sr-only">45% Complete</span>
						  </div>
						</div>
	
							
						<ul class="top-right-toolbar">
							<li><a data-toggle="dropdown" class="dropdown-toggle blue-violate" href="#" title="Users"><i class="icon-user"></i></a>
							</li>
							<li><a href="#" class="green" title="Upload"><i class=" icon-upload-alt"></i></a></li>
							<li><a href="#" class="bondi-blue" title="Settings"><i class="icon-cogs"></i></a></li>
						</ul>
					</div>
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Data</li>
					</ul>

					<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
							<div class="span12">
								<div class="span12">
							          <div class="content-widgets gray">
							            <div class="widget-head blue clearfix">
							              <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"><i class="icon-th-list"></i> Employee Data </h3>
							            </div>
							            <div class="widget-container">
							            	
							           		<!-- searching -->
											
											<div class="col-lg-4">
												<div class="input-group">
												  <input type="text" class="form-control" id ="search" name ="search" placeholder="Search..">
												  <span class="input-group-btn">
													<button class="btn btn-default" type="button">Go!</button>
												  </span>
												</div><!-- /input-group -->
											</div><!-- /.col-lg-6 -->

								            <div class="input-append input-icon">

												
												<button class="btn btn-warning icon-plus" type="button" onclick = "add_employee()">Add Employee</button>

											</div>
							            	

							            	<!-- content ajax -->
							              	<div class = "list"></div>

							            </div>
							          </div>
			        			</div>
						    </div>
						</div>
						<!--end content-->
					</div>
				</div>
			</div>
		
<script>
display_data();

function display_data(){

	$('.bar').show();

	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_employe_data/');?>",
				success: function(data){     

					$( ".list" ).html(data); 
					$('.bar').hide();
				}  
			});

}

function add_employee(){

	$('.bar').show();

	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>",
				success: function(data){     

					$( ".list" ).html(data); 
					$('.bar').hide();
				}  
			});

}
</script>