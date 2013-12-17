
		<?php $this->load->view('header');?>

<div class="layout">

		<?php $this->load->view('top_navbar');?>
	
		<?php $this->load->view('left_side_menu');?>
		
	<div class="main-wrapper">
		<div class="container-fluid">
		
			<!-- ALERT -->
			<div class = "alert_message">
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<i class="icon-exclamation-sign"></i><strong>Warning!</strong> For safety reason, please change your password periodicly.</div>
			</div>
			
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Human Resource Development</h3>
							<div class="progress progress-info progress-striped active" >
								<div class="bar" style="width: 100%" style="display:none"> </div>
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
						<li><a href="#">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Data</li>
					</ul>

					<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
							<div class="span12">
								<div class="span12">
							          <div class="content-widgets gray">
							            <div class="widget-head blue clearfix">
							              <h3 class="pull-left">Employee Data</h3>
							            </div>
							            <div class="widget-container">
							            	
							           		<!-- searching -->

								            <div class="input-append input-icon">

												<input class="search-input" type="text" placeholder="Search...">
												<i class=" icon-search"></i>
												<button class="btn" type="button">Go!</button>
												<button class="btn btn-success" type="button" onclick = "add_employee()">Add Employee</button>

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
		</div>
	</div>
</div>

<?php $this->load->view('footer');?>

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