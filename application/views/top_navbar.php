<!-- Navbar
    ================================================== -->
	<div class="nav navbar-inverse top-nav">
		<div class="container">
				<div class="navbar-header">
					&nbsp <img src="<?php echo base_url('images/logo-merp.gif');?>" width="103" height="50" alt="Media ERP"> &nbsp &nbsp &nbsp  
				<span class="home-link"><a href="<?php echo base_url('backend');?>" class="icon-home"></a></span>
				</div>
				
				<?php if(isset($menu_name)){
					if($menu_name== "HRD"):?>
				<div class="navbar-collapse col-sm-12 col-md-12">
					<ul class="nav navbar-nav"> 
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-cogs"></i> Organization Resource  <b class="icon-angle-down"></b>
							</a>
						<div class="dropdown-menu col-sm-12 col-md-12">
							<ul>
								<li><a href="<?php echo base_url('hrd/companies');?>"><i class="icon-file-alt"></i> Companies </a></li>	
								<li><a href="<?php echo base_url('hrd/department');?>"><i class="icon-file-alt"></i> Department & Division </a></li>	
								<li><a href="<?php echo base_url('hrd/job');?>"><i class="icon-file-alt"></i> Job Positions </a></li>
								<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class="icon-file-alt"></i>  Employee Categories</a></li>	  
							</ul> 
						</div>
						</li>					
					</ul>
					<ul class="nav navbar-nav"> 
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-cogs"></i> Time Tracking <b class="icon-angle-down"></b>
							</a>
						<div class="dropdown-menu col-sm-12 col-md-12">
							<ul>
								<li><a href="<?php echo base_url('hrd/project');?>"><i class="icon-file-alt"></i> Project </a></li>		
								<li><a href="<?php echo base_url('hrd/task');?>"><i class="icon-file-alt"></i> Task </a></li> 
							</ul> 
						</div>
						</li>					
					</ul>
					<ul class="nav navbar-nav "> 
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-building"></i> PT. Ratan Software Indonesia <b class="icon-angle-down"></b>
							</a>
							<div class="dropdown-menu col-sm-12 col-md-12">
								<ul>
									<li><a href="<?php echo base_url('hrd/project');?>"><i class="icon-building"></i> PT. Anasher Groupindo </a></li>		
									<li><a href="<?php echo base_url('hrd/task');?>"><i class="icon-building"></i> PT.  Harubiru Groupindo</a></li> 
								</ul> 
							</div>
						</li>					
					</ul>
				</div>
				<?php endif;?>
				<?php };?>	
				
				<div class="btn-toolbar pull-right notification-nav"> 
					<div class="btn-group" style="padding-right:20px">
						<div class="dropdown">
							<a class="btn btn-notification dropdown-toggle btn-default" data-toggle="dropdown"><i class="icon-globe">
							<span class="notify-tip">30</span></i></a> 
							<div class="dropdown-menu pull-right ">
								<span class="notify-h"> You have 20 notifications</span><a class="msg-container clearfix"><span class="notification-thumb">
								<img src="<?php echo base_url('upload/img/notify-thumb.png');?>" alt="user-thumb" height="50" width="50"></span><span class="notification-intro"> In hac habitasse platea dictumst. Aliquam posuere quam in nul<span class="notify-time"> 3 Hours Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><i class="icon-file"></i></span><span class="notification-intro"><strong>Files </strong>In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 8 Hours Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><img src="<?php echo base_url('upload/img/user-thumb.png');?>" alt="user-thumb" height="50" width="50"></span><span class="notification-intro"> In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 3 Days Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><i class=" icon-envelope-alt"></i></span><span class="notification-intro"><strong>Message</strong> In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 2 Weeks Ago </span></span></a>
								<button class="btn btn-primary btn-block btn-lg"> View All</button>
							</div>
						</div>
					</div>
					<div class="btn-group">
						<div class="dropdown">
							<span class="home-link"><a href="<?php echo base_url();?>" class="icon-lock"></a></span>
						</div>
					</div>
				</div> 
		</div>
	</div>