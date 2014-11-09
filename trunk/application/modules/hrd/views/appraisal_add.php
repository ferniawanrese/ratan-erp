
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
						<label  class="col-sm-3 control-label">Employee Name :</label>
						<div class="control col-md-4">
							<input name="child"  id = "child" class="form-control " type="text"    /> 
						</div>
					</div>
				 
					<div class="form-group">
						<label  class="col-sm-3 control-label">Plan :</label>
						<div class="control col-md-4">
							<span class = "input-group  "> 
								<select class = "form-control">
									<option>-- Choose Plan --</option>
								</select>
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
								</span>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Deadline :</label>
						<div class="control col-md-3">
							<div id="datetimepicker4" class="input-append dating">
									<span class="add-on">
									<input data-format="dd/MM/yyyy" type="text" class = "form-control" id = "employee_dob">
									</span>																	
							</div>																												
						</div>																									
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Proggress :</label>
						<div class="control col-md-3">
							<input name="child"  id = "child" class="form-control " type="text"    /> 
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Ending Date :</label>
						<div class="control col-md-3">
							<div id="datetimepicker4" class="input-append dating ">
									<span class="add-on">
									<input data-format="dd/MM/yyyy" type="text" class = "form-control" id = "employee_dob">
									</span>																	
							</div>																												
						</div>																									
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Appreciation :</label>
						<div class="control col-md-3">
							<input name="child"  id = "child" class="form-control " type="text"    /> 
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
								<fieldset title="Appraisal">
									<legend> </legend>
									 
								</fieldset>
								<fieldset title="Internal Notes">
									<legend> </legend>
									<div class="control-group">
										<label class="control-label">First Name</label>
										<div class="controls">
											<input type="text" placeholder="First Name" class="input-large">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Last Name</label>
										<div class="controls">
											<input type="text" placeholder="Last Name" class="input-large">
										</div>
									</div>
								</fieldset>
								<fieldset title="Public Notes">
									<legend> </legend>
									<div class="control-group">
										<label class="control-label">Text Input</label>
										<div class="controls">
											<input type="text" placeholder="Text Input" class="input-large">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Checkbox</label>
										<div class="controls">
											<label class="checkbox">
											<input type="checkbox" value="">
											Option one is this and that—be sure to include why it's great </label>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Radio</label>
										<div class="controls">
											<label class="radio">
											<input type="radio" name="optionsRadios" value="option1" checked>
											Option one is this and that—be sure to include why it's great </label>
										</div>
									</div>
								</fieldset>
								<button type="submit" class="finish btn btn-extend"> Finish!</button>
							</span>
						</div>
					</div>
				</div>
			</div>							  
</form>		 

<script>
 $('.dating').datetimepicker({
            pickTime: false
        });
</script>