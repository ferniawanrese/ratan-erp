<!-- Navbar
    ================================================== -->
	<div class="nav navbar-inverse top-nav">
		<div class="container">
				<div class="navbar-header">
					&nbsp <img src="<?php echo base_url('images/logo-merp.gif');?>" width="103" height="50" alt="Media ERP"> &nbsp &nbsp &nbsp  
					<span class="home-link"><a href="<?php echo base_url('backend');?>" class="icon-home"></a></span>
				</div>
				
				<?php //$this->core->print_rr($this->session->all_userdata());?>
				
				<?php if(isset($menu_name)){
					if($menu_name== "HRD"):?>
				<div class="navbar-collapse col-sm-12 col-md-12">
					  
					<ul class="nav navbar-nav "> 
					 
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#" >
								<i class="icon-building"></i> <?php echo $this->session->userdata('current_companyName');?>  <b class="icon-angle-down"></b> 
							</a>
							<div class="dropdown-menu">
								<ul>
									<?php foreach($this->session->userdata('company') as $companies):?>
										<?php if($companies['company_ID'] ==  $this->session->userdata('current_companyID')){continue;} ;?>
										<li><a href="<?php echo base_url('backend/changecompany/'.$companies['company_ID']);?>"><i class="icon-building"></i> <?php echo $companies['company_name'] ;?></a></li>		
									 <?php endforeach;?>
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