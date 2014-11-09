<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Sign In/Sign Out</li> 
</ul>

<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Sign In/Sign Out</h3> 
										</div> 		
										<div class="well col-sm-12 col-md-12">
										 	<form class="form-horizontal form-validate" action="<?php echo base_url('hrd/signin_upload');?>" method = "post" enctype="multipart/form-data"> 
													<label  class="col-sm-3 control-label">Upload *.csv/*.xls data : </label>
														<div class="control col-md-8"> 
														<div class="controls">
															<div class="fileupload fileupload-new" data-provides="fileupload">
																<div class="input-append">
																	<div class="uneditable-input span3">
																		<i class="icon-file fileupload-exists"></i><span class="fileupload-preview"></span>
																	</div>
																	<span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
																	<input type="file" id="userfile" name="userfile"   />
																	</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
																 
																</div>
															</div>
														</div>
													</div> 
													
													<div class="form-action">
														<button type="submit" class="btn btn-info"><i class="icon-upload-alt"></i> Upload</button> 
													</div>
												</form>
											
										</div> 
									</div>
						</div>
</div>					
  