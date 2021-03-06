
<?php $this->load->view('header');?>

<div class="layout">

		<?php $this->load->view('top_navbar',$data);?>
		<?php $this->load->view('left_side_menu',$data);?>
		
		
		<div class="main-wrapper">	
			<div class="container-fluid">
			
			<!-- ALERT -->
			<div class = "alert_message_required col-sm-12 col-md-12" style="display:none;">
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="icon-exclamation-sign"></i><strong>Warning!</strong> There are serious errors in your form submission, please see field required!
				</div>
			</div>
			
			<div class="row-fluid ">
				<div class="col-sm-12 col-md-12">
					<div class="primary-head">
						<h3 class="page-header "><font class = "hidden-xs hidden-sm"><?php echo $data['module_name'];?></font></h3> 
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