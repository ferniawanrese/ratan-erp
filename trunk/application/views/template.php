
		<?php $this->load->view('header');?>

<div class="layout">

		<?php $this->load->view('top_navbar', $data);?>
		
		<?php $this->load->view('left_side_menu',$data);?>
		
		
	<div class="main-wrapper">
	
		<div class="container-fluid">
		
			<!-- ALERT -->
			
		<div class="alert alert-danger alert-error">
				<button class="close" data-dismiss="alert" type="button">x</button>
				<i class="icon-exclamation-sign"></i>
				<strong>Warning!</strong>
				Best check yo self, you're not looking too good.
		</div>
		
		<?php $this->load->view('mainmenu',$data);?>
		
		<?php $this->load->view($content, $data);?>
		
			
		</div>
	</div>
</div>

		<?php $this->load->view('footer');?>