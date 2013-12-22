
<!--============j avascript===========-->

<script src="js/jquery.validate.js"></script>
<script src="js/stepy.jquery.js"></script>
<script src="js/bootbox.js"></script>
<script src="js/bootstrap-fileupload.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
			$(function () {
       	 	$('#employee_dob').datetimepicker({
            language: 'pt-BR'
       			 });
   			 });
            $(function () {
                /*==JQUERY STEPY==*/
                $('#stepy').stepy({
                    backLabel: 'Back',
                    nextLabel: 'Next',
                    block: true,
                    description: true,
                    legend: false,
                    titleClick: true,
                    titleTarget: '#stepy_tabby'
                });
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
                           // required: 'Name field is required!'
                        },
                        'email': {
                           // required: 'Email field is requerid!'
                        },
                    }
                });
            });

			 $(document).on("click", ".alert-box", function (e) {
                bootbox.alert("Hello world!", function () {
                    //callback
                });
            });
 </script>

					<div class="stepy-widget">
						<div class="widget-head clearfix orange">
							<div id="top_tabby" class="pull-right">
							</div>
						</div>
						<div class="widget-container gray ">
							<div class="form-container">
								<form id="stepy_form" class="form-horizontal" enctype="multipart/form-data" >
									<fieldset title="Step 1">
										<legend>General Information</legend>
										<div class="control-group">
											<label class="control-label">Name</label>
											<div class="controls">
												<input name="employee_name" id = "employee_name" type="text"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label">Email Address</label>
											<div class="controls">
												<input name="employee_email" id = "employee_email" type="email"/>
												<button class="alert-box btn"><i class="icon-plus ">
												</i>Add User</button>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Department</label>
											<div class="controls">
												<input name="employee_divisionID" id="employee_divisionID" type="text"/>
												<button class="alert-box btn"><i class="icon-plus ">
												</i>New Department</button>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Position</label>
											<div class="controls">
												<input name="employee_positionID" type="text"/>
												<button class="alert-box btn"><i class="icon-plus ">
												</i>New Position</button>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Manager</label>
											<div class="controls">
												<input name="employee_managerID" type="text"/>
												
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Badge</label>
											<div class="controls">
												<input name="employee_badge" type="text"/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Work Phone</label>
											<div class="controls">
												<input name="employee_phone" type="text"/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Work Mobile</label>
											<div class="controls">
												<input name="employee_mobilephone" type="text"/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Home Address</label>
											<div class="controls">
												<input name="employee_address" type="text"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label">Work Location</label>
											<div class="controls">
												<input name="employee_worklocationID" type="text"/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Photo</label>
											<div class="controls">
										
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA" alt="img"/>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
												</div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" id="userfile" name="userfile" hidden="true"/>
													</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
													
													<input type = "text" name='employee_photo' id='employee_photo'>
												</div>

											</div>
	
									
											</div>
										</div>
									</fieldset>
									<fieldset title="Step 2">
										<legend>Personal Information</legend>
										<div class="control-group">
											<label class="control-label">SSN No</label>
											<div class="controls">
												<input type="text" id = "employee_SSN" name = "employee_SSN" placeholder="Social Security Number" class="input-large">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Passport No</label>
											<div class="controls">
												<input type="text" name = "employee_passport_no" id = "employee_passport_no" placeholder="Passport Number" class="input-large">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label">Gender</label>
											<div class="controls">
												<select name = "employee_gender" id = "employee_gender">
													<option value = "Male">Male</option>
													<option value = "Female">Female</option>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Blood Group</label>
											<div class="controls">
												<select name = "employee_blood" id = 'employee_blood'>
													<option value = "A">A</option>
													<option value = "B">B</option>
													<option value = "AB">AB</option>
													<option value = "O">O</option>

												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Marital Status</label>
											<div class="controls">
												<select name = "employee_maritalstat" id ="employee_maritalstat">
													<option value = "Single">Single</option>
													<option value = "Married">Married</option>
													<option value = "Widower">Widower</option>
													<option value = "Divorced">Divorced</option>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Religion</label>
											<div class="controls">
												<select name = "employee_religion" id = "employee_religion">
													<option value = "Single">Islam</option>
													<option value = "Married">Katholik</option>
													<option value = "Widower">Protestan</option>
													<option value = "Divorced">Hindu</option>
													<option value = "Divorced">Budha</option>
													<option value = "Divorced">Other</option>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Nationality</label>
											<div class="controls">
												<select name = "employee_countryID" id = "employee_countryID">

													<?php foreach($country as $key_country):?>
													<option value = "<?php echo $key_country['idCountry'];?>">
														<?php echo $key_country['countryName'];?></option>
													<?php endforeach;?>
												</select>

											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Date of Birth</label>
											<div class="controls">
												<div id="employee_dob" class="input-append date ">
												<input type="text" data-format="dd/MM/yyyy" id = "employee_dob" name = "employee_dob">
												<span class="add-on ">
												<i class="icon-calendar" data-date-icon="icon-calendar" data-time-icon="icon-time"></i>
												</span>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset title="Step 3">
										<legend>Notes</legend>
										<div class="control-group">
											<label class="control-label">Employee Notes</label>
											<div class="controls">
												<textarea name = "employee_notes" id = "employee_notes"></textarea>
											</div>
										</div>
										<div class = "pull-right">
											<a class="btn btn-success" onclick="submit_form()"> Finish!</a>
										</div>
									</fieldset >
									
									<div class="finish"></div>
								</form>

							</div>
						</div>
					</div>

<!-- dialog contents on hidden div -->   

	<div id="modal-content" class="hide">
		<div id="modal-body">
			<input type="text" name="asd" id="id">
		</div>
	</div>

<script type="text/javascript"src="<?php echo base_url('js/ajaxfileupload.js') ?>"></script>

<script>
 function submit_form() {
 	$('.bar').show();
    $.ajax({
        url: '<?php echo base_url('hrd/hrd_adddata_employee');?>',
        cache: false,
        type: 'POST',
        data : $('#stepy_form').serialize(),

        success: function(json) {
           // alert('all done');
           ajaxFileUpload();
           $('.bar').hide();

            display_data();
        }
    });
};

function ajaxFileUpload(){
	 
	  $.ajaxFileUpload({
			url:'<?php echo base_url('hrd/do_upload')?>', 
			secureuri:false,
			fileElementId:'userfile',
			contentType:'multipart/form-data',
			type: 'POST',
			dataType: 'text',
			success: function (data, status)
							{
								
							}
			 	})
				return false;
            }
    									
	</script>



				