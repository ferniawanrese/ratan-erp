
<?php $this->load->view('header');?>

<div class="layout">

		<?php $this->load->view('top_navbar');?>
		<?php $this->load->view('left_side_menu',$data);?>
		
		
		<div class="main-wrapper">	
			<div class="container-fluid">
			
			<!-- ALERT -->
			<div class = "alert_message col-sm-12 col-md-12">
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon-exclamation-sign"></i><strong>Warning!</strong> For safety reason, please change your password periodicly.
				</div>
			</div>
			
			<div class="row-fluid ">
				<div class="col-sm-12 col-md-12">
					<div class="primary-head">
						<h3 class="page-header"><?php echo $data['module_name'];?></h3>
						
						<div class="progress progress-striped active">
								
								<div style="width: 100%;display:none " class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" >							
								</div>
								
							 <span >
						</div>	
							
						<ul class="top-right-toolbar">
							<li><a data-toggle="dropdown" class="dropdown-toggle blue-violate" href="#" title="Users"><i class="icon-user"></i></a>
							</li>
							<li><a href="#" class="green" title="Upload"><i class=" icon-upload-alt"></i></a></li>
							<li><a href="#" class="bondi-blue" title="Settings"><i class="icon-cogs"></i></a></li>
						</ul>
						
					</div>
			
					<?php $this->load->view($content, $data);?>
					
				</div>
			</div>
						
			</div>
		</div>
	
</div>

<?php $this->load->view('footer');?>