
		<?php $this->load->view('header');?>

<div class="layout">

		<?php $this->load->view('top_navbar', $data);?>
		
		<?php $this->load->view('left_side_menu',$data);?>
		
		
	<div class="main-wrapper">
	
		<div class="container-fluid">
		
			<!-- ALERT -->
			<div class="alert_message">
				<div class="alert alert-error alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert"></button>
					<i class="icon-exclamation-sign"></i><strong>Warning!</strong> Best check yo self, you're not looking too good.
				</div>
			</div>
		
		<?php $this->load->view('mainmenu',$data);?>
		
		<?php $this->load->view($content, $data);?>
		
			
		</div>
	</div>
</div>

		<?php $this->load->view('footer');?>