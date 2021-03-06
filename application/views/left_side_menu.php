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
							<?php if($menu_name== "Asset"):?> 
								<li  class = "<?php  if($menu_active == "Main"){echo "active";};?>"><a href="#Main" class="icon-th-large" title="Main Module"></a></li>
								<li  class = "<?php  if($menu_active == "Configuration"){echo "active";};?>" ><a href="#Configuration" class="icon-cogs" title="Configuration"></a></li>
								<li  class = "<?php  if($menu_active == "Report"){echo "active";};?>"><a href="#Report" class="icon-bar-chart" title="Report"></a></li>
							<?php endif;?>
							<!-- end header ASSET -->
							
							<!-- header PURCHASE -->
							<?php if($menu_name== "Purchase"):?> 
								<li  class = "<?php  if($menu_active == "Main"){echo "active";};?>"><a href="#Main" class="icon-th-large" title="Main Module"></a></li>
								<li  class = "<?php  if($menu_active == "Configuration"){echo "active";};?>" ><a href="#Configuration" class="icon-cogs" title="Configuration"></a></li>
								<li  class = "<?php  if($menu_active == "Report"){echo "active";};?>"><a href="#Report" class="icon-bar-chart" title="Report"></a></li>
							<?php endif;?>
							<!-- end header PURCHASE -->
							
							<!-- header PURCHASE -->
							<?php if($menu_name== "CRM"):?> 
								<li  class = "<?php  if($menu_active == "Main"){echo "active";};?>"><a href="#Main" class="icon-th-large" title="Main Module"></a></li>
								<li  class = "<?php  if($menu_active == "Configuration"){echo "active";};?>" ><a href="#Configuration" class="icon-cogs" title="Configuration"></a></li>
								<li  class = "<?php  if($menu_active == "Report"){echo "active";};?>"><a href="#Report" class="icon-bar-chart" title="Report"></a></li>
							<?php endif;?>
							<!-- end header PURCHASE -->
							
							<!-- header POS -->
							<?php if($menu_name== "POS"):?> 
								<li  class = "<?php  if($menu_active == "Main"){echo "active";};?>"><a href="#Main" class="icon-th-large" title="Main Module"></a></li>
								<li  class = "<?php  if($menu_active == "Configuration"){echo "active";};?>" ><a href="#Configuration" class="icon-cogs" title="Configuration"></a></li>
								<li  class = "<?php  if($menu_active == "Report"){echo "active";};?>"><a href="#Report" class="icon-bar-chart" title="Report"></a></li>
							<?php endif;?>
							<!-- end header POS -->
							
							<!-- header POS -->
							<?php if($menu_name== "Warehouse"):?> 
								<li  class = "<?php  if($menu_active == "Main"){echo "active";};?>"><a href="#Main" class="icon-th-large" title="Main Module"></a></li>
								<li  class = "<?php  if($menu_active == "Configuration"){echo "active";};?>" ><a href="#Configuration" class="icon-cogs" title="Configuration"></a></li>
								<li  class = "<?php  if($menu_active == "Report"){echo "active";};?>"><a href="#Report" class="icon-bar-chart" title="Report"></a></li>
							<?php endif;?>
							<!-- end header Warehouse -->
							 
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
										<li><a href="<?php echo base_url('hrd/signin');?>"><i class=" icon-file-alt"></i> Upload Attandance</a></li>
										<li ><a href="<?php echo base_url('hrd/attendances');?>"><i class=" icon-file-alt"></i> Attendances Summary</a></li> 
									</ul>
									</li>
									<li><a href="<?php echo base_url('hrd/expends');?>"><i class="icon-file-alt"></i>  Expenses</a></li>	
									<li><a href="#"><i class="icon-caret-right"></i> Leaves</a>
									<ul>
										<li><a href="<?php echo base_url('hrd/leaves');?>"><i class=" icon-file-alt"></i>Leave Requests</a></li>
										<li><a href="<?php echo base_url('hrd/leave_approval');?>"><i class=" icon-file-alt"></i>Leave Approval</a></li> 
										<li><a href="<?php echo base_url('hrd/leave_summary');?>"><i class=" icon-file-alt"></i>Leave Summary</a></li>   
									</ul> 
									</li>  
									<!--<li><a href="#"><i class="icon-caret-right"></i> Payroll</a>
									<ul>
										<li><a href="<?php echo base_url('hrd/payslip');?>"><i class=" icon-file-alt"></i>Employee Payslip</a></li>  
										<li  ><a href="<?php echo base_url('hrd/payrollbatch');?>"><i class=" icon-file-alt"></i>Payroll Batches  </a></li>  
									</ul> -->
									</li>	
									<li><a href="#"><i class="icon-caret-right"></i> Recruitment</a> 
									<ul>
										<li><a href="<?php echo base_url('hrd/applicant');?>"><i class=" icon-file-alt"></i>Applicants</a></li>
										<li  ><a href="<?php echo base_url('hrd/jobspace');?>"><i class=" icon-file-alt"></i>Job Space</a></li>  
									</ul> 
									</li>
									<li><a href="<?php echo base_url('hrd/file_manager');?>"><i class="icon-folder-open"></i>  File Manager</a></li>	
									<!--<li><a href="#"><i class="icon-caret-right"></i> Appraisal</a>
									<ul>
										<li><a href="<?php echo base_url('hrd/appraisal');?>"><i class=" icon-file-alt"></i>Appraisal</a></li>
										<li  ><a href="<?php echo base_url('hrd/interview_req');?>"><i class=" icon-file-alt"></i>Interview Request</a></li> 
									</ul> 
									</li>  -->
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Configuration"){echo "active";};?>" id="Configuration">
								<h4 class="side-head">  Configuration</h4> 
								<ul class="accordion-nav">
									 <li><a href="<?php echo base_url('hrd/autobadge');?>" ><i class="icon-file-alt"></i>  Auto Badge</a></li>  
									 <li  ><a href="#" ><i class="icon-caret-right"></i> Organization Resource</a>
										<ul > 
											<li><a href="<?php echo base_url('hrd/department');?>"  >  Department & Division</a></li>
											<li><a href="<?php echo base_url('hrd/job_position');?>">  Job Positions</a></li>
											<!--<li><a href="<?php echo base_url('hrd/employee_cat');?>">  Employee Categories</a></li>-->
										 </ul>   
									</li> 
									 <li ><a href="#"><i class="icon-caret-right"></i> Time Tracking</a>
										<ul>
											<li><a href="<?php echo base_url('hrd/project');?>"> Project </a></li>
											<li  ><a href="<?php echo base_url('hrd/task');?>">  Task </a></li> 
										 </ul>   
									</li>
									
									<li ><a href="#"><i class="icon-caret-right"></i> Leaves</a>
										<ul> 
											<li  ><a href="<?php echo base_url('hrd/leave_type');?>">  Leave Type </a></li> 							
										 </ul>    
										 <ul> 
											<li  ><a href="<?php echo base_url('hrd/weekend');?>"> Weekend </a></li> 							
										 </ul> 
									</li>
									<!--<li ><a href="#"><i class="icon-caret-right"></i> Payroll</a>
										 <ul> 
											<li  ><a href="<?php echo base_url('hrd/allowance');?>">  Allowance/Deduction  </a></li> 							
										 </ul>  
										<ul> 
											<li  ><a href="<?php echo base_url('hrd/tax');?>">  Tax  Formula</a></li> 							
										 </ul> 
									</li>-->
									<li ><a href="#"><i class="icon-caret-right"></i> Goods</a>
										<ul> 
											<li  ><a href="<?php echo base_url('hrd/product');?>"> Product </a></li> 							
										 </ul>  
										<ul> 
											<li  ><a href="<?php echo base_url('hrd/uom');?>"> UoM </a></li> 							
										 </ul>
										 <ul> 
											<li  ><a href="<?php echo base_url('hrd/currency');?>"> Currencies </a></li> 							
										 </ul>
									</li>
									<!--<li ><a href="#"><i class="icon-caret-right"></i> Recruitment</a>
										<ul> 
											<li  ><a href="<?php echo base_url('hrd/product');?>"> Applicant Stage </a></li> 							
										 </ul>  
										<ul> 
											<li  ><a href="<?php echo base_url('hrd/uom');?>"> School Degree </a></li> 							
										 </ul> 
									</li>
									<li ><a href="#"><i class="icon-caret-right"></i> Appraisal</a>
										<ul> 
											<li  ><a href="<?php echo base_url('hrd/task');?>">  Appraisal Form </a></li>
											<li><a href="<?php echo base_url('hrd/project');?>"> Plan </a></li>
											<li><a href="<?php echo base_url('hrd/project');?>"> Survey </a></li>											
										 </ul>   
									</li>-->
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Report"){echo "active";};?>" id="Report">
								<h4 class="side-head"> <?php //echo $module_name;?> Report</h4> 
								<ul class="accordion-nav"> 
									<li><a href="<?php echo base_url('hrd/expense_chart');?>">  Expense Analysis</a></li>   
									<!--<li><a href="login.html">  Appraisal Analysis</a></li>-->
									<li  ><a href="<?php echo base_url('hrd/timesheet_chart');?>"> Timesheet Analysis </a></li>  
									<!--<li><a href="<?php echo base_url('hrd/leaves_chart');?>"> Attendance Analysis</a> </li>
									<li><a href="<?php echo base_url('hrd/leaves_chart');?>"> Leaves Analysis</a> </li>-->
								</ul>
							</div>
				
				<?php endif;?>
					<!-- end menu HRD -->
				<!-- menu HRD -->
				<?php if($menu_name== "Asset"):?> 	
							<div class="tab-pane <?php  if($menu_active == "Main"){echo "active";};?>  " id="Main">
								<h4 class="side-head"> Main Module  </h4> 
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i>  Asset Data</a></li> 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Configuration"){echo "active";};?>" id="Configuration">
								<h4 class="side-head">  Configuration</h4> 
								<ul class="accordion-nav">
								
										<li ><a href="#"><i class="icon-caret-right"></i> Asset Config</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  Asset Group</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> Asset State</a></li>  	
											</ul>
										</li>
										
										<li><a href="<?php echo base_url('asset/vendor');?>" ><i class="icon-file-alt"></i> Vendor</a></li>  			
																				
										 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Report"){echo "active";};?>" id="Report">
								<h4 class="side-head"> <?php //echo $module_name;?> Report</h4> 
								<ul class="accordion-nav"> 
									<li><a href="<?php echo base_url('asset/asset_chart');?>">  Asset Analysis</a></li>     
								</ul>
							</div>
				<?php endif;?>	
				
				<?php if($menu_name== "Purchase"):?> 	
							<div class="tab-pane <?php  if($menu_active == "Main"){echo "active";};?>  " id="Main">
								<h4 class="side-head"> Main Module  </h4> 
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i>  Material Request</a></li> 
								</ul>
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i>  Purchase Request</a></li> 
								</ul>
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i>  Purchase Order</a></li> 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Configuration"){echo "active";};?>" id="Configuration">
								<h4 class="side-head">  Configuration</h4> 
								<ul class="accordion-nav">
								
										<li ><a href="#"><i class="icon-caret-right"></i> Purchase Config</a>
											<ul> 
											<li><a href="<?php echo base_url('purchase/shipping');?>" ><i class="icon-file-alt"></i>  Shipping Address</a></li> 
											<li><a href="<?php echo base_url('purchase/billing');?>" ><i class="icon-file-alt"></i> Billing Address</a></li>  	
											</ul>
										</li>
										
										<li><a href="<?php echo base_url('asset/vendor');?>" ><i class="icon-file-alt"></i> Vendor</a></li>  			
																				
										 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Report"){echo "active";};?>" id="Report">
								<h4 class="side-head"> <?php //echo $module_name;?> Report</h4> 
								<ul class="accordion-nav"> 
									<li><a href="<?php echo base_url('asset/asset_chart');?>">  Purchase Analysis</a></li>     
								</ul>
							</div>
				<?php endif;?>	
				
				<!-- menu HRD -->
				<?php if($menu_name== "CRM"):?> 	
							<div class="tab-pane <?php  if($menu_active == "Main"){echo "active";};?>  " id="Main">
								<h4 class="side-head"> Main Module  </h4> 
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('crm');?>" ><i class="icon-file-alt"></i>  Customer Data</a></li>
									<li><a href="<?php echo base_url('crm/meeting');?>" ><i class="icon-file-alt"></i>  Meeting</a></li> 
									<li ><a href="#"><i class="icon-caret-right"></i> Phone Calls</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  Logged Calls</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> Scheduled Calls</a></li>  	
											</ul>
									</li>
									<li><a href="<?php echo base_url('followup');?>" ><i class="icon-file-alt"></i>  Goods Stock Data</a></li>  
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Configuration"){echo "active";};?>" id="Configuration">
								<h4 class="side-head">  Configuration</h4> 
								<ul class="accordion-nav">
								
										<li ><a href="#"><i class="icon-caret-right"></i> CRM Config</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  CRM Group</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> CRM State</a></li>  	
											</ul>
										</li>
										
										<li><a href="<?php echo base_url('asset/vendor');?>" ><i class="icon-file-alt"></i> Vendor</a></li>  			
																				
										 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Report"){echo "active";};?>" id="Report">
								<h4 class="side-head"> <?php //echo $module_name;?> Report</h4> 
								<ul class="accordion-nav"> 
									<li><a href="<?php echo base_url('asset/asset_chart');?>">  Opportunities Analysis</a></li>     
								</ul>
							</div>
				<?php endif;?>	
				
				<!-- menu HRD -->
				<?php if($menu_name== "POS"):?> 	
							<div class="tab-pane <?php  if($menu_active == "Main"){echo "active";};?>  " id="Main">
								<h4 class="side-head"> Main Module  </h4> 
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i> Goods Stock Data</a></li> 
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i> Quotation Data</a></li> 
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i> PO Customer Data</a></li> 
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i> Material Request Data</a></li>   
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Configuration"){echo "active";};?>" id="Configuration">
								<h4 class="side-head">  Configuration</h4> 
								<ul class="accordion-nav">
								
										<li ><a href="#"><i class="icon-caret-right"></i> CRM Config</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  CRM Group</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> CRM State</a></li>  	
											</ul>
										</li>
										
										<li><a href="<?php echo base_url('asset/vendor');?>" ><i class="icon-file-alt"></i> Vendor</a></li>  			
																 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Report"){echo "active";};?>" id="Report">
								<h4 class="side-head"> <?php //echo $module_name;?> Report</h4> 
								<ul class="accordion-nav"> 
									<li><a href="<?php echo base_url('asset/asset_chart');?>">  Asset Analysis</a></li>     
								</ul>
							</div>
				<?php endif;?>	
				
				<!-- menu HRD -->
				<?php if($menu_name== "Warehouse"):?> 	
							<div class="tab-pane <?php  if($menu_active == "Main"){echo "active";};?>  " id="Main">
								<h4 class="side-head"> Main Module  </h4> 
								<ul class="accordion-nav">
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i> Goods Stock Data</a></li> 
									
									<li><a href="<?php echo base_url('asset');?>" ><i class="icon-file-alt"></i> Material Request Data</a></li>    
									<li ><a href="#"><i class="icon-caret-right"></i> Material In/Out</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  Material In Data</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> Material Out Data</a></li>  	
											</ul>
									</li>		
									<li ><a href="#"><i class="icon-caret-right"></i> Transmital</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  Transmital In Data</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> Transmital Out Data</a></li>  	
											</ul>
									</li>			
									<li ><a href="#"><i class="icon-caret-right"></i> Retur</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  Retur In Data</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> Retur Out Data</a></li>  	
											</ul>
									</li>									
									 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Configuration"){echo "active";};?>" id="Configuration">
								<h4 class="side-head">  Configuration</h4> 
								<ul class="accordion-nav">
								
										<li ><a href="#"><i class="icon-caret-right"></i> CRM Config</a>
											<ul> 
											<li><a href="<?php echo base_url('asset/asset_group');?>" ><i class="icon-file-alt"></i>  CRM Group</a></li> 
											<li><a href="<?php echo base_url('asset/asset_state');?>" ><i class="icon-file-alt"></i> CRM State</a></li>  	
											</ul>
										</li>
										
										<li><a href="<?php echo base_url('asset/vendor');?>" ><i class="icon-file-alt"></i> Vendor</a></li>  			
																 
								</ul>
							</div>
							<div class="tab-pane  <?php  if($menu_active == "Report"){echo "active";};?>" id="Report">
								<h4 class="side-head"> <?php //echo $module_name;?> Report</h4> 
								<ul class="accordion-nav"> 
									<li><a href="<?php echo base_url('asset/asset_chart');?>">  Asset Analysis</a></li>     
								</ul>
							</div>
				<?php endif;?>	
				
				<?php endif;?>	
				<!-- menu Backend -->	
				<?php if(!isset($menu_name)){?>
						<div class="tab-pane active" id="main">
							<h4 class="side-head"><?php echo $module_name;?></h4>						
							<ul class="metro-sidenav clearfix">								
									<li><span class="notify-tip">5</span><a href="#" class="brown"><i class="icon-envelope"></i><span>Inbox</span></a></li>
									<li><a href="#" class="grey"><i class="icon-user "></i><span>Account</span></a></li>
									
									<li><span class="notify-tip">2</span><a href="#" class=" bondi-blue"><i class="icon-time"></i><span>Events</span></a></li>
									<li><a href="<?php echo base_url('backend/company');?>" class="orange"><i class="icon-building"></i><span>Companies</span></a></li>
									 
							</ul>						
						</div>
				<?php };?>
				<!-- end menu Backend -->
				
				</div>
		</div>
	<!-- end left menu module -->	
</div>