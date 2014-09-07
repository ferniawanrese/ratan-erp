<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class=" "> Time Tracking</li>
	<li class="active">Timesheet Lines</li>
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Timesheet Lines </h3>
											
										</div>
																			
										<div class="well col-sm-12 col-md-12">
										<div  id = "btn-create" class="form-group"> 
											<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
											<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
										</div>
										<span  id ="search" style = "display: none;">
											<form id = "form_filter" action ="<?php echo base_url('hrd/hrd_save_employee/');?>" method="post">
												<fieldset class="default panel">
													<legend>Filtering </legend>
												 
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<select class="form-control">
																<option val = "" >-- Choose Project --</option>
															</select> 
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<select class="form-control">
																<option val = "" >-- All Users --</option>
															</select> 
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<input id="employee_name" class="form-control" type="text" placeholder="Start Date" name="filter[employee_name]">
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<input id="employee_name" class="form-control" type="text" placeholder="End Date" name="filter[employee_name]">
														</div>
													</div>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<span class="btn-group">
															<button class="btn btn-default" type="submit"> Search! </button>
															<button class="btn btn-default" onclick="clearfilter()" type="button"> Clear Filter </button>
															</span>
														</div>
													</div>
													
												</fieldset>
											</form>	
										</span>	
											<div class="tab-widget">
												<ul class="nav nav-tabs" id="myTab1">
													<li class="active"><a href="#user"><i class="icon-file"></i> Project</a></li>
													<li><a href="#post"><i class=" icon-user"></i> Users</a></li>
													<li><a href="#task"><i class=" icon-tasks"></i> Entries</a></li>
												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="user">
														<div class="user_list">
															<div class="user_block">
																<div class="info_block">
																	<div class="widget_thumb">
																		<img width="46" height="46" alt="User" src="images/user-thumb1.png">
																	</div>
																	<ul class="list_info clearfix">
																		<li><span>Name: <i><a href="#">Zara Zarin</a></i></span></li>
																		<li><span>IP: 194.132.12.1 Date: 13th Jan 2012</span></li>
																		<li><span>User Type: Paid, <i>Package Name:</i><b>Gold</b></span></li>
																	</ul>
																</div>
																<div class="clearfix">
																	<div class="btn-group pull-left">
																		<a href="#" class="btn btn-mini"><i class=" icon-remove"></i> Suspend</a><a href="#" class="btn "><i class=" icon-remove-sign"></i> Delete</a>
																	</div>
																	<div class="btn-group pull-right">
																		<a href="#" class="btn"><i class=" icon-edit"></i> Edit</a>
																	</div>
																</div>
															</div>
															<div class="user_block">
																<div class="info_block">
																	<div class="widget_thumb">
																		<img width="46" height="46" alt="User" src="images/user-thumb1.png">
																	</div>
																	<ul class="list_info clearfix">
																		<li><span>Name: <i><a href="#">Zara Zarin</a></i></span></li>
																		<li><span>IP: 194.132.12.1 Date: 13th Jan 2012</span></li>
																		<li><span>User Type: Paid, <i>Package Name:</i><b>Gold</b></span></li>
																	</ul>
																</div>
																<div class="clearfix">
																	<div class="btn-group pull-left">
																		<a href="#" class="btn btn-mini"><i class=" icon-remove"></i> Suspend</a><a href="#" class="btn "><i class=" icon-remove-sign"></i> Delete</a>
																	</div>
																	<div class="btn-group pull-right">
																		<a href="#" class="btn"><i class=" icon-edit"></i> Edit</a>
																	</div>
																</div>
															</div>
															<div class="user_block">
																<div class="info_block">
																	<div class="widget_thumb">
																		<img width="46" height="46" alt="User" src="images/user-thumb1.png">
																	</div>
																	<ul class="list_info clearfix">
																		<li><span>Name: <i><a href="#">Zara Zarin</a></i></span></li>
																		<li><span>IP: 194.132.12.1 Date: 13th Jan 2012</span></li>
																		<li><span>User Type: Paid, <i>Package Name:</i><b>Gold</b></span></li>
																	</ul>
																</div>
																<div class="clearfix">
																	<div class="btn-group pull-left">
																		<a href="#" class="btn btn-mini"><i class=" icon-remove"></i> Suspend</a><a href="#" class="btn "><i class=" icon-remove-sign"></i> Delete</a>
																	</div>
																	<div class="btn-group pull-right">
																		<a href="#" class="btn"><i class=" icon-edit"></i> Edit</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="post">
														<div class="post_list clearfix">
															<div class="post_block clearfix">
																<h6><a href="#">Sed eu adipiscing nisi. Maecenas dapibus lacinia pretium. Praesent eget lectus ac odio euismod consequat. </a></h6>
																<ul class="post_meta clearfix">
																	<li><span>Posted By:</span><a href="#">Joe Smith</a></li>
																	<li><span>Date:</span><a href="#">30th April 2012</a></li>
																	<li class="total_post"><span>Total Post: </span><a href="#">30</a></li>
																</ul>
																<div class="btn-group pull-left">
																	<a href="#" class="btn"><i class=" icon-edit"></i> Edit</a><a href="#" class="btn "><i class=" icon-remove"></i> Delete</a>
																</div>
																<div class="btn-group pull-right">
																	<a href="#" class="btn"><i class=" icon-remove-sign"></i> Reject</a><a href="#" class="btn "><i class=" icon-ok"></i> Approve</a>
																</div>
															</div>
															<div class="post_block clearfix">
																<h6><a href="#">Sed eu adipiscing nisi. Maecenas dapibus lacinia pretium. Praesent eget lectus ac odio euismod consequat. </a></h6>
																<ul class="post_meta clearfix">
																	<li><span>Posted By:</span><a href="#">Joe Smith</a></li>
																	<li><span>Date:</span><a href="#">30th April 2012</a></li>
																	<li class="total_post"><span>Total Post: </span><a href="#">30</a></li>
																</ul>
																<div class="btn-group pull-left">
																	<a href="#" class="btn"><i class=" icon-edit"></i> Edit</a><a href="#" class="btn "><i class=" icon-remove"></i> Delete</a>
																</div>
																<div class="btn-group pull-right">
																	<a href="#" class="btn"><i class=" icon-remove-sign"></i> Reject</a><a href="#" class="btn "><i class=" icon-ok"></i> Approve</a>
																</div>
															</div>
															<div class="post_block clearfix">
																<h6><a href="#">Sed eu adipiscing nisi. Maecenas dapibus lacinia pretium. Praesent eget lectus ac odio euismod consequat. </a></h6>
																<ul class="post_meta clearfix">
																	<li><span>Posted By:</span><a href="#">Joe Smith</a></li>
																	<li><span>Date:</span><a href="#">30th April 2012</a></li>
																	<li class="total_post"><span>Total Post: </span><a href="#">30</a></li>
																</ul>
																<div class="btn-group pull-left">
																	<a href="#" class="btn"><i class=" icon-edit"></i> Edit</a><a href="#" class="btn "><i class=" icon-remove"></i> Delete</a>
																</div>
																<div class="btn-group pull-right">
																	<a href="#" class="btn"><i class=" icon-remove-sign"></i> Reject</a><a href="#" class="btn "><i class=" icon-ok"></i> Approve</a>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="task">
														<ul class="task-list">
															<li class="done"><span class="task-check">
															<input name="" type="checkbox" checked value="">
															</span><a href="#">Etiam vulputate bibendum odio, vitae mollis urna rutrum id.</a></li>
															<li><span class="task-check">
															<input name="" type="checkbox" value="">
															</span><a href="#">Ut ac erat ac magna malesuada aliquam.</a></li>
															<li class="done"><span class="task-check">
															<input name="" type="checkbox" checked value="">
															</span><a href="#">Praesent scelerisque augue a augue lobortis id iaculis mi tincidunt.</a></li>
															<li><span class="task-check">
															<input name="" type="checkbox" value="">
															</span><a href="#">Phasellus tristique nulla at leo interdum pretium.</a></li>
															<li><span class="task-check">
															<input name="" type="checkbox" value="">
															</span><a href="#">Morbi tincidunt lacus et turpis fringilla in vehicula dolor semper.</a></li>
														</ul>
													</div>
												</div>
											</div> 
										 
											<div class = "list col-sm-12 col-md-12">
												<!-- content ajax -->											
											</div>
											
										</div> 
									</div>
						</div>
</div>			
 
	

<script>
function close_filter(){											
$("#search").fadeOut();
$("#Show").show();
$("#Hide").hide();
}
function open_filter(){											
$("#search").fadeIn();
$("#Hide").show();
$("#Show").hide();
}
</script>				