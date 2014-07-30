<div class="leftbar leftbar-close clearfix">
		
		<div class="admin-info clearfix ">	
			<img src="<?php echo base_url($this->core->get_im($this->session->userdata('employee_photo'),100,100));?>" class="img-responsive " 
					onError="this.src='<?php echo base_url('images/no_image.png');?>'">
				
			<div class="admin-meta ">
				
				
				<ul >
					<li class="admin-username"><?php echo $this->session->userdata('employee_name');?></li>
					<li><a href="#">Edit Profile</a></li>
					<li><a href="#">View Profile </a><a href="#"></li>
					<li><i class="icon-lock"></i> Logout</a></li>
				</ul>
			</div>
		</div>
		
		<div class="left-nav clearfix">
				<div class="left-primary-nav">
					<ul id="myTab">
					
					<?php if(!isset($menu_name)){?>
						<li class="active"><a href="#main" class="icon-desktop" title="Dashboard"></a></li>
					<?php };?>
					
						<?php if(isset($menu_name)){
							if($menu_name== "HRD"):?>
						<li class="active" ><a href="#forms" class="icon-th-large" title="Forms"></a></li>
						<?php endif;?>
						<?php };?>
						
					</ul>
				</div>
				<div class="responsive-leftbar">
					<i class="icon-list"></i>
				</div>
				<div class="left-secondary-nav tab-content">
				
				<?php if(!isset($menu_name)){?>
				<div class="tab-pane active" id="main">
					<h4 class="side-head"><?php echo $module_name;?></h4>						
					<ul class="metro-sidenav clearfix">								
							<li><span class="notify-tip">30</span><a href="#" class="brown"><i class="icon-user"></i><span>User</span></a></li>
							<li><a href="#" class="orange"><i class="icon-cogs"></i><span>Settings</span></a></li>
							<li><a href="#" class=" bondi-blue"><i class="icon-time"></i><span>Events</span></a></li>
							<li><a href="#" class=" blue-violate"><i class="icon-lightbulb"></i><span>Support</span></a></li>
					</ul>						
				</div>
				<?php };?>	
				
				<?php if(isset($menu_name)){
					if($menu_name== "HRD"):?>
					
				<div class="tab-pane active" id="forms">
					<h4 class="side-head"><?php echo $module_name;?></h4>
					<ul class="accordion-nav">
						<li><a href="#"><i class="icon-cogs"></i> Configurations</a>
						<ul>
							<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class=" icon-file-alt"></i> Categories of Employee</a></li>
							<li><a href="<?php echo base_url('hrd/employee_structure');?>"><i class=" icon-file-alt"></i> Categories Structure</a></li>
							<li><a href="page-405.html"><i class=" icon-file-alt"></i> Job Positions</a></li>
							<li><a href="page-500.html"><i class=" icon-file-alt"></i> Departments</a></li>
						</ul>
						</li>
						<li><a href="login.html"><i class=" icon-table"></i> Reporting</a></li>                               
					</ul>
				</div>
				
				<?php endif;?>
				<?php };?>	
				</div>
		</div>
		
</div>