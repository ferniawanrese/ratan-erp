
<!--============j avascript===========-->

<script src="js/jquery.validate.js"></script>
<script src="js/stepy.jquery.js"></script>
<script src="js/bootbox.js"></script>
<script src="js/bootstrap-fileupload.js"></script>
<script type="text/javascript">
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
                            required: 'Name field is required!'
                        },
                        'email': {
                            required: 'Email field is requerid!'
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
								<form id="stepy_form" class=" form-horizontal" enctype="multipart/form-data">
									<fieldset title="Step 1">
										<legend>General Information</legend>
										<div class="control-group">
											<label class="control-label">Name</label>
											<div class="controls">
												<input name="name" type="text"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label">Email Address</label>
											<div class="controls">
												<input name="email" type="email"/>
												<button class="alert-box btn"><i class="icon-user ">
												</i>Add User</button>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Department</label>
											<div class="controls">
												<input name="employee_divisionID" type="text"/>
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
											<label class="control-label">Photo</label>
											<div class="controls">
										
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA" alt="img"/>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
												</div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
													<input type="file" id = "userfile" name = "userfile" />
													</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
	
									
											</div>
										</div>
									</fieldset>
									<fieldset title="Step 2">
										<legend>Personal Information</legend>
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
									<fieldset title="Step 3">
										<legend>Category</legend>
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
									<fieldset title="Step 4">
										<legend>Notes</legend>
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
										
		$(':file').change(function(){
            var file = this.files[0];
            name = file.name;
            size = file.size;
            type = file.type;

            if(file.name.length < 1) {

            }
            else if(file.size > 5000000) {
                alert("File is to big");
            }
            else if(file.type != 'image/png' && file.type != 'image/jpg' && !file.type != 'image/gif' && file.type != 'image/jpeg' ) {
                alert("File doesnt match png, jpg or gif");
            }
            else{

				$.ajaxFileUpload({
						url:"<?php echo base_url('hrd/do_upload');?>",
						secureuri:false,
						fileElementId:'userfile',
						contentType:'multipart/form-data',
						type: 'POST',
						dataType: 'text',
						success: function (data, status)
							{
								alert('uploaded');
							}
			 	})
				return false;
            }
    	});
										
	</script>

				