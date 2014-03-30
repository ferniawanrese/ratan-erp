<div class="leftbar leftbar-close clearfix">
		
		<div class="admin-info clearfix ">	
			<div class="admin-meta ">
					<img src="<?php echo $this->core->get_im($userdata[0]['employee_photo'],100,100);?>" class="img-responsive img-thumbnail">	
			</div>
			<div class="admin-meta ">
				<ul >
					<li class="admin-username"><?php echo $employee_name;?></li>
					<li><a href="#">Edit Profile</a></li>
					<li><a href="#">View Profile </a><a href="#"></li>
					<li><i class="icon-lock"></i> Logout</a></li>
				</ul>
			</div>
		</div>
		
		<div class="left-nav clearfix">
				<div class="left-primary-nav">
					<ul id="myTab">
						<li class="active"><a href="#main" class="icon-desktop" title="Dashboard"></a></li>
						<li><a href="#forms" class="icon-th-large" title="Forms"></a></li>
						
					</ul>
				</div>
				<div class="responsive-leftbar">
					<i class="icon-list"></i>
				</div>
				<div class="left-secondary-nav tab-content">
					<div class="tab-pane active" id="main">
						<h4 class="side-head">Dashboard</h4>						
						<ul class="metro-sidenav clearfix">								
								<li><span class="notify-tip">30</span><a href="#" class="brown"><i class="icon-user"></i><span>User</span></a></li>
								<li><a href="#" class="orange"><i class="icon-cogs"></i><span>Settings</span></a></li>
								<li><a href="#" class=" bondi-blue"><i class="icon-time"></i><span>Events</span></a></li>
								<li><a href="#" class=" blue-violate"><i class="icon-lightbulb"></i><span>Support</span></a></li>
						</ul>						
					</div>
					<div class="tab-pane" id="forms">
						<h4 class="side-head">Forms</h4>
						<ul id="nav" class="accordion-nav">
							<li><a href="form-elements.html"><i class="icon-list-alt"></i> Form Elements <span class="notify-tip">50</span></a></li>
							<li><a href="form-components.html"><i class="icon-th"></i> Form Components </a></li>
							<li><a href="form-validation.html"><i class="icon-ok-circle"></i> Form Validation<span>Quisque commodo lectus sit amet sem </span></a></li>
							<li><a href="form-wizard.html"><i class="icon-external-link"></i> Wizard </a></li>
							<li><a href="text-editor.html"><i class="icon-pencil"></i> WYSIWYG editor <span>Quisque commodo lectus sit amet sem </span></a></li>
						</ul>
					</div>
					
					
				</div>
		</div>
		
</div>