
		<?php $this->load->view('header');?>

<div class="layout">

		<?php $this->load->view('top_navbar', $data);?>
		
		<?php $this->load->view('left_side_menu',$data);?>
		
		
	<div class="main-wrapper">
	
		<div class="container-fluid">
		
		<?php $this->load->view('mainmenu',$data);?>
		
		<?php $this->load->view($content, $data);?>
		
			
		</div>
	</div>
</div>

		<?php $this->load->view('footer');?>