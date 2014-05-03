
					 <div class="col-md-12">
							<ul class="nav nav-pills nav-justified thumbnail setup-panel">
								<li class="active"><a href="#step-1">
									General Information
								</a></li>
								<li ><a href="#step-2">
									Personal Information
								</a></li>
								<li><a href="#step-3">
									Note
								</a></li>
							</ul>
						</div>
					
					
						<div class="form-container">
							<form id="stepy_form" class="form-horizontal" enctype="multipart/form-data" >
								<div class="row setup-content " id="step-1">
										
												<input name="employee_hexaID" type="hidden" value = "<?php echo $data_detail[0]['employee_hexaID'];?>"/>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Name :</label>
													<div class="control col-md-6">
														<input name="employee_name" required id = "employee_name" class="form-control" type="text" placeholder = "Full Name" value = "<?php echo $data_detail[0]['employee_name'];?>"/>
													</div>
												</div>
												
												<div class="form-group ">
													<label  class="col-sm-3 control-label">Email Address :</label>
													<div class="control input-group col-md-6">
														<input name="employee_email" required id = "employee_email" class="form-control" type="email" value = "<?php echo $data_detail[0]['employee_email'];?>"/>
														
														<span class="input-group-addon info"><span class="icon-plus" style = "cursor:pointer;"></span></span>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Department : </label>
													<div class="control col-md-6">
														<input name="employee_divisionID" id="employee_divisionID" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_divisionID'];?>"/>
														<button class="alert-box btn"><i class="icon-plus ">
														</i>New Department</button>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Position :</label>
													<div class="control col-md-6">
														<input name="employee_positionID" required class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_positionID'];?>"/>
														<button class="alert-box btn"><i class="icon-plus ">
														</i>New Position</button>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Manager :</label>
													<div class="control col-md-6">
														<input name="employee_managerID" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_managerID'];?>"/>
														
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Badge :</label>
													<div class="control col-md-6">
														<input name="employee_badge" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_badge'];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Work Phone :</label>
													<div class="control col-md-3">
														<input name="employee_phone" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_phone'];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Work Mobile :</label>
													<div class="control col-md-3">
														<input name="employee_mobilephone" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_mobilephone'];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Home Address :</label>
													<div class="control col-md-6">
														<input name="employee_address" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_address'];?>"/>
													</div>
												</div>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Work Location :</label>
													<div class="control col-md-6">
														<input name="employee_worklocationID" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_worklocationID'];?>"/>
													</div>
												</div>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Photo :</label>
													<div class="control col-md-6">
														
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																<?php if($data_detail[0]['employee_photo']):?>
																	<img src="<?php  echo base_url($data_detail[0]['employee_photo']);?>" alt="image"/>
																<?php endif;?>	
															</div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
															</div>
															<div>
																<span class="btn btn-file"><span class="fileupload-new">Select image</span>
																<span class="fileupload-exists">Change</span>
																<input type="file" id="userfile" name="userfile" />
																</span>
																<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
															</div>
														</div>
														
													</div>
												</div>
												
												<div class = "pull-right">
													<button id="activate-step-2" class="btn btn-primary alert-box btn">Next Step</button>
												</div>
								</div>	
								<div class="row setup-content " id="step-2">			
											<fieldset title="Step 2">
												
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
													<label  class="col-sm-3 control-label">Date Picker :</label>
													<div class="control col-md-3">
														<div id="datetimepicker4" class="input-append ">
																<span class="add-on">
																<input data-format="dd/MM/yyyy" type="text" class = "form-control" id = "employee_dob">
																</span>																	
														</div>																												
													</div>																									
												</div>
												
												
												<div class = "pull-right">
													 <button id="activate-step-3" class="btn btn-primary">Next Step </button>
												</div>
												
								</div>
								<div class="row setup-content " id="step-3">
								
												<div class="form-group">
													<label  class="col-sm-3 control-label">Employee Notes :</label>
													<div class="control col-md-6">
														<textarea name = "employee_notes" id = "employee_notes" class="form-control"></textarea>
													</div>
												</div>
												<div class = "pull-right">
													
													<button class="alert-box btn" type = "submit" id="multi-post">Finish</button>
													<!--<a  class="btn btn-success" id="multi-post" class="alert-box btn">Finish</a>-->
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


	$("#stepy_form").submit(function(e)
	{
		$('.bar').show();
		var formObj = $(this);

	if(window.FormData !== undefined)  // for HTML5 browsers
	//	if(false)
		{		
			var formData = new FormData(this);
			
			$.ajax({
	        	url: "<?php echo base_url('hrd/hrd_save_employee/')?>",
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

					$("#multi-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
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


	$("#multi-post").click(function(){
			$("#stepy_form").submit();		
	});


</script>

<script type="text/javascript">
   
        $('#datetimepicker4').datetimepicker({
            pickTime: false
        });
   
</script>

<script>
// Tab step

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
	 $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })   
});

</script>
