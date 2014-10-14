<div class="leftbar leftbar-close clearfix">
	<!--header photo-->	
		<div class="admin-info clearfix ">	  
			<div class="admin-meta ">
					<?php if($this->session->userdata('employee_photo')):?>
					 <img src="<?php echo base_url($this->core->get_im($this->session->userdata('employee_photo'),100,100));?>" class="img-responsive img-thumbnail" 
					onError="this.src='<?php echo base_url('images/no_image.png');?>'"> 
					<?php else:?>
					 <img src="'<?php echo base_url('images/no_image.png');?>" class="img-responsive " 
					onError="this.src='<?php echo base_url('images/no_image.png');?>'"> 
					<?php endif;?> 
			</div>
			<div class="admin-meta ">
				<ul >
					<li class="admin-username"><?php echo $this->session->userdata('employee_name');?></li>
					<li><a href="#"><small>Edit Profile</small></a></li>
					<li><a href="#"><small>View Profile </small></a><a href="#"></li>
					<li><i class="icon-lock"></i> <small>Logout</small></a></li>
				</ul>
			</div>
		</div>
	<!-- end header photo -->

	<!-- left menu module -->
		<div class="left-nav clearfix"> 
				<div class="left-primary-nav">
					<ul id="myTab"> 
						<?php if(!isset($menu_name)){?>
								<li class="active"><a href="#main" class="icon-desktop" title="Dashboard"></a></li>
						<?php };?>
						
						<?php if(isset($menu_name)):?>
							 
							<!-- header HRD -->
							<?php if($menu_name== "HRD"):?> 
								<li  class = "<?php  if($menu_active == "Main"){echo "active";};?>"><a href="#Main" class="icon-th-large" title="Main Module"></a></li>
								<li  class = "<?php  if($menu_active == "Configuration"){echo "active";};?>" ><a href="#Configuration" class="icon-cogs" title="Configuration"></a></li>
								<li  class = "<?php  if($menu_active == "Report"){echo "active";};?>"><a href="#Report" class="icon-bar-chart" title="Report"></a></li>
							<?php endif;?>
							<!-- end header HRD -->
							
							<!-- header ASSET -->
							<?php if($menu_name== "ASSET"):?> 
								<li ><a href="#forms" class="icon-th-large" title="Main Module"></a></li>
								<li ><a href="#Configuration" class="icon-cogs" title="Configuration"></a></li>
								<li ><a href="#Report" class="icon-bar-chart" title="Report"></a></li>
							<?php endif;?>
							<!-- end header ASSET -->
							 
						<?php endif;?> 
					</ul>
				</div>
				
				<div class="responsive-leftbar">
					<i class="icon-list"></i>
				</div>
				<div class="left-secondary-nav tab-content">
				 
				<?php if(isset($menu_name)):?>
				
					<!-- menu HRD -->
					<?php if($menu_name== "HRD"):?> 
					 
							<div class="tab-pane <?php  if($menu_active == "Main"){echo "active";};?>  " id="Main">
								<h4 class="side-head"> Main Module  </h4>
								 
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('hrd');?>" ><i class="icon-file-alt"></i>  Employee Data</a></li>     
									<li ><a href="#"><i class="icon-caret-right"></i> Time Tracking</a>
									<ul >
										<li  ><a href="<?php echo base_url('hrd/register_time');?>"  ><i class=" icon-file-alt"></i> Register Time</a></li>
										<li  ><a href="<?php echo base_url('hrd/timesheet');?>"><i class=" icon-file-alt"></i> My Timesheets</a></li>
										<!--<li><a href="<?php echo base_url('hrd/timesheet_line');?>"><i class=" icon-file-alt"></i> Timesheet Lines</a></li>-->
									</ul>
									</li>
									<li><a href="#"><i class="icon-caret-right"></i> Attendances</a>
									<ul >
										<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class=" icon-file-alt"></i> Sign In / Sign Out</a></li>
										<li ><a href="<?php echo base_url('hrd/job_position');?>"><i class=" icon-file-alt"></i> Attendances</a></li> 
									</ul>
									</li>
									<li><a href="#"><i class="icon-caret-right"></i> Appraisal</a>
									<ul>
										<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class=" icon-file-alt"></i> Appraisal</a></li>
										<li  ><a href="<?php echo base_url('hrd/job_position');?>"><i class=" icon-file-alt"></i> Interview Request</a></li> 
									</ul> 
									</li>         
									<li><a href="#"><i class="icon-caret-right"></i> Leaves</a>
									<ul>
										<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class=" icon-file-alt"></i> Leaves Request</a></li>
										<li  ><a href="<?php echo base_url('hrd/job_position');?>"><i class=" icon-file-alt"></i>Leaves Request to Approve</a></li> 
										<li  ><a href="<?php echo base_url('hrd/job_position');?>"><i class=" icon-file-alt"></i>Allocation Requests</a></li> 
										<li  ><a href="<?php echo base_url('hrd/job_position');?>"><i class=" icon-file-alt"></i>Leaves Summary</a></li> 
									</ul> 
									</li>
									<li><a href="#"><i class="icon-caret-right"></i> Payroll</a>
									<ul>
										<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class=" icon-file-alt"></i> Employee Payslips</a></li>
										<li  ><a href="<?php echo base_url('hrd/job_position');?>"><i class=" icon-file-alt"></i>Payslips Batches</a></li>  
									</ul> 
									</li>		
									<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class="icon-file-alt"></i>  Expends</a></li>	
									<li><a href="#"><i class="icon-caret-right"></i> Recruitment</a>
									<ul>
										<li><a href="<?php echo base_url('hrd/employee_cat');?>"><i class=" icon-file-alt"></i> Applicants</a></li>
										<li  ><a href="<?php echo base_url('hrd/job_position');?>"><i class=" icon-file-alt"></i>Job Positions</a></li>  
									</ul> 
									</li>		 		
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Configuration"){echo "active";};?>" id="Configuration">
								<h4 class="side-head">  Configuration</h4> 
								<ul class="accordion-nav">
									 <li  ><a href="#" ><i class="icon-caret-right"></i> Organization Resource</a>
										<ul >
											<li  ><a href="<?php echo base_url('hrd/department');?>" >  Companies</a></li>
											<li><a href="<?php echo base_url('hrd/department');?>"  >  Department & Division</a></li>
											<li><a href="<?php echo base_url('hrd/job_position');?>">  Job Positions</a></li>
											<li><a href="<?php echo base_url('hrd/employee_cat');?>">  Employee Categories</a></li>
										 </ul>   
									</li> 
									 <li ><a href="#"><i class="icon-caret-right"></i> Time Tracking</a>
										<ul>
											<li><a href="<?php echo base_url('hrd/project');?>"> Project </a></li>
											<li  ><a href="<?php echo base_url('hrd/task');?>">  Task </a></li> 
										 </ul>   
									</li>
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Report"){echo "active";};?>" id="Report">
								<h4 class="side-head"> <?php //echo $module_name;?> Report</h4> 
								<ul class="accordion-nav"> 
									<li><a href="login.html">  Employee Data</a></li>    
									<li><a href="login.html">  Time Tracking</a></li>
								</ul>
							</div>
				
					<?php endif;?>
					<!-- end menu HRD -->
					
				<?php endif;?>	
				
				<!-- menu Backend -->	
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
				<!-- end menu Backend -->
				
				</div>
		</div>
	<!-- end left menu module -->	
</div>