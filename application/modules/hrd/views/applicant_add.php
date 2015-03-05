
<script type="text/javascript">
            $(function () {
                /*==JQUERY STEPY==*/ 
                $('#stepy1').stepy({
                    backLabel: 'Back',
                    nextLabel: 'Next',
                    block: true,
                    description: true,
                    legend: false,
                    titleClick: true,
                    titleTarget: '#stepy_tabby1'
                });
                $('#stepy_form').stepy({
                    backLabel: 'Back',
                    nextLabel: 'Next',
                    errorImage: true,
                    block: true,
                    description: true,
                    legend: false,
                    titleClick: true,
                    titleTarget: '#top_tabby',
                    validate: true
                });
                $('#stepy_form').validate({
                    errorPlacement: function (error, element) {
                        $('#stepy_form div.stepy-error').append(error);
                    },
                    rules: {
                        'name': 'required',
                        'email': 'required',
                    },
                    messages: {
                        'name': {
                            required: 'Name field is required!'
                        },
                        'email': {
                            required: 'Email field is requerid!'
                        },
                    }
                });
            });
        </script> 
		 
		
	<form  id = "depAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
				
		<div class="col-md-12">	
				<div class="form-group"  >    
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Applicant Name :</label>
						<div class="control col-md-4">
							<input name="applicant_name"  id = "applicant_name" class="form-control " type="text"    /> 
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Subject :</label>
						<div class="control col-md-4">
							<input name="subject"  id = "subject" class="form-control " type="text"    /> 
						</div>
					</div>
				 
					<div class="form-group">
						<label  class="col-sm-3 control-label">Job :</label>
						<div class="control col-md-4">
							<span class = "input-group  "> 
								<select class = "form-control" name = "job_ID" id = "job_ID">
									<option>-- Choose Job --</option>
								</select>
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
								</span>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Department :</label>
						<div class="control col-md-4">
							<span class = "input-group " id = "department_ID" name = "department_ID"> 
								<select class = "form-control">
									<option>-- Choose Department --</option>
								</select>
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
								</span>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Stage :</label>
						<div class="control col-md-4">
							<span class = "input-group  "> 
								<select class = "form-control" id = "applicant_stageID" name = "applicant_stageID">
									<option>-- Choose Stage --</option>
								</select>
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
								</span>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Employee Responsible :</label>
						<div class="control col-md-4">
							<input name="responsible_ID"  id = "responsible_ID" class="form-control " type="text"    /> 
						</div>
					</div>
					 
					<div class="form-group">
						<label  class="col-sm-3 control-label">Closed Date :</label>
						<div class="control col-md-3">
							<div id="datetimepicker4" class="input-append dating ">
									<span class="add-on">
									<input data-format="dd/MM/yyyy" type="text" class = "form-control" id = "date_closed" name = "date_closed">
									</span>																	
							</div>																												
						</div>																									
					</div> 
				</div>
 
				<div class="stepy-widget">
					<div class="widget-head clearfix bondi-blue">
						<div id="stepy_tabby1">
						</div>
					</div>
					<div class="widget-container gray ">
						<div class="form-container">
							<span id="stepy1" class=" form-horizontal left-align form-well" >
								<fieldset title="Job Info">
									<legend>Contact & Contract</legend>
									 <span class = "data_load">
										<div class="col-md-6">	 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Partner :</label>
													<div class="control col-md-8">
														<input name="partner_ID"  id = "partner_ID" class="form-control " type="text"    /> 
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Phone :</label>
													<div class="control col-md-8">
														<input name="phone"  id = "phone" class="form-control " type="text"    /> 
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Mobile :</label>
													<div class="control col-md-8">
														<input name="mobile"  id = "mobile" class="form-control " type="text"    /> 
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Email :</label>
													<div class="control col-md-8">
														<input name="email"  id = "email" class="form-control " type="text"    /> 
													</div>
												</div> 
												 
										</div>
										<div class="col-md-6">	 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Expected Salary  :</label>
													<div class="control col-md-8">
														<input name="expectation_salary"  id = "expectation_salary" class="form-control " type="text"    /> 
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Proposed Salary :</label>
													<div class="control col-md-8">
														<input class="form-control " type="text"    /> 
													</div>
												</div> 
												 
										</div>
									 </span>
								</fieldset> 
								<fieldset title="Qualification Data">
									<legend>  Qualification </legend>
									 <span class = "data_load">
										<div class="col-md-12">	 
												<div class="form-group">
													<label  class="col-sm-3 control-label">Degree :</label>
													<div class="control col-md-4">
														<span class = "input-group  "> 
															<select class = "form-control" id = "degree_ID" name = "degree_ID">
																<option>-- Choose Degree --</option>
															</select>
															<span class="input-group-addon ">
																<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
															</span>
														</span>
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-3 control-label">Appreciation :</label>
													<div class="control col-md-4">
														<span class = "input-group  "> 
															<select class = "form-control" name = "appreciation" id="appreciation">
																<option>-- Choose Plan --</option>
															</select>
															<span class="input-group-addon ">
																<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
															</span>
														</span>
													</div>
												</div> 
												 
										</div> 
									 </span>
								</fieldset>
								<fieldset title="Notes">
									<legend>  Notes about this application</legend>
									<span class = "data_load">
										<div class="col-md-12">	 
											<div class="control-group">
												<label class="control-label"> </label>
												
												<div class="form-group"> 
													<div class="control col-md-12">
														<textarea rows="5" cols="80" style="width: 80%" class="tinymce-simple" name = "notes" id = "notes"></textarea>
													</div>
												</div> 
												
											</div>
										</div>
									</span>
								</fieldset>
								
								<button type="submit" class="finish btn btn-extend"> Finish!</button>
							</span>
						</div>
					</div>
				</div>
			</div>							  
</form>		

<!-- dialog contents on hidden div -->   
 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class = "icon-remove"></i></button>
				<h1><span id = "modal_label"></span></h1>
			</div>
			<div class="modal-body" id = "modal_body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
 
<script>
load_data();
function load_data(){

	$.ajax({
	
		url:"<?php echo base_url('hrd/appraisal_datac');?>",
		success: function(data){      
					$( ".data_load" ).html(data); 		 
		} 
	 
	});

}
</script>


