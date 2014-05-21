<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Categories Structure</li>
	
</ul>

<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Categories Structure Data </h3>
											
										</div>
																			
										<div class="well col-sm-12 col-md-12">
											<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_employee()"> Create</button>
												<button class="btn btn-inverse btn-large icon-file-alt" type="button" onclick = "exportdata()"> Export to Excel</button>
											</div>
										</div>
									</div>
						</div>
</div>						