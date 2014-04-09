
<input type = 'hidden' name='action' id = 'action' value = '<?php echo $action;?>'>
						
					 <div class="col-md-12">
							<ul class="nav nav-pills nav-justified thumbnail setup-panel">
								<li class="active"><a href="#step-1">
									
									<p class="list-group-item-text">First step description</p>
								</a></li>
								<li class="disabled"><a href="#step-2">
								
									<p class="list-group-item-text">Second step description</p>
								</a></li>
								<li class="disabled"><a href="#step-3">
								
									<p class="list-group-item-text">Third step description</p>
								</a></li>
							</ul>
						</div>
					
					
						<div class="form-container">
							<form id="stepy_form" class="form-horizontal" enctype="multipart/form-data" >
								<div class="row setup-content " id="step-1">
										
												<input name="employee_hexaID" type="hidden" value = "<?php if (isset($employee_data_detail[0]['employee_hexaID'])) {echo $employee_data_detail[0]['employee_hexaID'];}?>"/>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Name :</label>
													<div class="control col-md-6">
														<input name="employee_name" id = "employee_name" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_name'])) {echo $employee_data_detail[0]['employee_name'];}?>"/>
													</div>
												</div>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Email Address :</label>
													<div class="control col-md-6">
														<input name="employee_email" id = "employee_email" class="form-control" type="email" value = "<?php if (isset($employee_data_detail[0]['employee_email'])) {echo $employee_data_detail[0]['employee_email'];}?>"/>
														<button class="alert-box btn"><i class="icon-plus ">
														</i>Add User</button>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Department : </label>
													<div class="control col-md-6">
														<input name="employee_divisionID" id="employee_divisionID" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_divisionID'])) {echo $employee_data_detail[0]['employee_divisionID'];}?>"/>
														<button class="alert-box btn"><i class="icon-plus ">
														</i>New Department</button>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Position :</label>
													<div class="control col-md-6">
														<input name="employee_positionID" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_positionID'])) {echo $employee_data_detail[0]['employee_positionID'];}?>"/>
														<button class="alert-box btn"><i class="icon-plus ">
														</i>New Position</button>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Manager :</label>
													<div class="control col-md-6">
														<input name="employee_managerID" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_managerID'])) {echo $employee_data_detail[0]['employee_managerID'];}?>"/>
														
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Badge :</label>
													<div class="control col-md-6">
														<input name="employee_badge" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_badge'])) {echo $employee_data_detail[0]['employee_badge'];}?>"/>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Work Phone :</label>
													<div class="control col-md-6">
														<input name="employee_phone" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_phone'])) {echo $employee_data_detail[0]['employee_phone'];}?>"/>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Work Mobile :</label>
													<div class="control col-md-6">
														<input name="employee_mobilephone" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_mobilephone'])) {echo $employee_data_detail[0]['employee_mobilephone'];}?>"/>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Home Address :</label>
													<div class="control col-md-6">
														<input name="employee_address" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_address'])) {echo $employee_data_detail[0]['employee_address'];}?>"/>
													</div>
												</div>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Work Location :</label>
													<div class="control col-md-6">
														<input name="employee_worklocationID" class="form-control" type="text" value = "<?php if (isset($employee_data_detail[0]['employee_worklocationID'])) {echo $employee_data_detail[0]['employee_worklocationID'];}?>"/>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Photo :</label>
													<div class="control col-md-6">
													<input name="employee_photo" id = "employee_photo" type="hidden" value = "<?php if (isset($employee_data_detail[0]['employee_photo'])) {echo $employee_data_detail[0]['employee_photo'];}?>"/>
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
															<img src="<?php if (isset($employee_data_detail[0]['employee_photo'])) {echo base_url($employee_data_detail[0]['employee_photo']);}?>" alt="image"/>
														</div>
														<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
														</div>
														<div>
															<span class="btn btn-file"><span class="fileupload-new">Select image</span>
															<span class="fileupload-exists">Change</span>
															<input type="file" id="userfile" name="userfile" />
															</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													</div>
												</div>
											
								</div>	
								<div class="row setup-content " id="step-2">			
											<fieldset title="Step 2">
												<legend>Personal Information</legend>
												<div class="form-group">
													<label  class="col-sm-3 control-label">SSN No :</label>
													<div class="control col-md-6">
														<input type="text" id = "employee_SSN" name = "employee_SSN" class="form-control" placeholder="Social Security Number" class="input-large">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Passport No :</label>
													<div class="control col-md-6">
														<input type="text" name = "employee_passport_no" id = "employee_passport_no" class="form-control" placeholder="Passport Number" class="input-large">
													</div>
												</div>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Gender :</label>
													<div class="control col-md-3">
														<select name = "employee_gender" id = "employee_gender" class="form-control">
															<option value = "Male">Male</option>
															<option value = "Female">Female</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Blood Group :</label>
													<div class="control col-md-3">
														<select name = "employee_blood" id = 'employee_blood' class="form-control">
															<option value = "A">A</option>
															<option value = "B">B</option>
															<option value = "AB">AB</option>
															<option value = "O">O</option>

														</select>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Marital Status :</label>
													<div class="control col-md-3">
														<select name = "employee_maritalstat" id ="employee_maritalstat" class="form-control">
															<option value = "Single">Single</option>
															<option value = "Married">Married</option>
															<option value = "Widower">Widower</option>
															<option value = "Divorced">Divorced</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Religion :</label>
													<div class="control col-md-3">
														<select name = "employee_religion" id = "employee_religion" class="form-control">
															<option value = "Single">Islam</option>
															<option value = "Married">Katholik</option>
															<option value = "Widower">Protestan</option>
															<option value = "Divorced">Hindu</option>
															<option value = "Divorced">Budha</option>
															<option value = "Divorced">Other</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Nationality :</label>
													<div class="control col-md-6">
														<select name = "employee_countryID" id = "employee_countryID" class="form-control">

															<?php foreach($country as $key_country):?>
															<option value = "<?php echo $key_country['idCountry'];?>">
																<?php echo $key_country['countryName'];?></option>
															<?php endforeach;?>
														</select>

													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Date of Birth :</label>
													<div class="control col-md-6">
														<div id="employee_dob" class="input-append date ">
														<input type="text" data-format="dd/MM/yyyy" id = "employee_dob" name = "employee_dob" class="form-control">
														<span class="add-on ">
														<i class="icon-calendar" data-date-icon="icon-calendar" data-time-icon="icon-time"></i>
														</span>
														</div>
													</div>
												</div>
								</div>
								<div class="row setup-content " id="step-2">
								
												<legend>Notes</legend>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Employee Notes :</label>
													<div class="control col-md-6">
														<textarea name = "employee_notes" id = "employee_notes" class="form-control"></textarea>
													</div>
												</div>
												<div class = "pull-right">
													<!--<a class="btn btn-success" onclick="submit_form()"> Finish!</a>-->
													<a  class="btn btn-success" id="multi-post" >Finish</a>
												</div>
								</div >
											
											<div class="finish"></div>
										</div>									
								</div>
							</form>

						</div>
					
<!-- dialog contents on hidden div -->   

	<div id="modal-content" class="hide">
		<div id="modal-body">
			<input type="text" name="asd" id="id">
		</div>
	</div>

	

<!-- script ajax save -->
<script>

$(document).ready(function()
{

	$("#stepy_form").submit(function(e)
	{
			$('.bar').show();
		var action = document.getElementById('action').value;
		var formObj = $(this);
		var formURL = "<?php echo base_url('hrd/hrd_save_employee/')?>" + "/" + action;

	if(window.FormData !== undefined)  // for HTML5 browsers
	//	if(false)
		{
		
			var formData = new FormData(this);
			
			$.ajax({
	        	url: formURL,
		        type: 'POST',
				data:  formData,
				mimeType:"multipart/form-data",
				contentType: false,
	    	    cache: false,
	        	processData:false,
				success: function(data, textStatus, jqXHR)
			    {
						$('.bar').hide();
						display_data();
			    },
			  	error: function(jqXHR, textStatus, errorThrown) 
		    	{

					//$("#multi-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
		    	} 	        
		   });
	        e.preventDefault();
	   }
	   else  //for olden browsers
		{
			//generate a random id
			var  iframeId = 'unique' + (new Date().getTime());

			//create an empty iframe
			var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');

			//hide it
			iframe.hide();

			//set form target to iframe
			formObj.attr('target',iframeId);

			//Add iframe to body
			iframe.appendTo('body');
			iframe.load(function(e)
			{
				var doc = getDoc(iframe[0]);
				var docRoot = doc.body ? doc.body : doc.documentElement;
				var data = docRoot.innerHTML;
				$("#multi-msg").html('<pre><code>'+data+'</code></pre>');
			});
		
		}

	});


	$("#multi-post").click(function()
		{
			
		$("#stepy_form").submit();
		
	});


});

function do_update_image(){
	document.getElementById('employee_photo').value = '';
}

</script>

<!-- end ajax save -->


<!--============j avascript===========-->

<script src="js/bootstrap-fileupload.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script>
$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })    
});


</script>
