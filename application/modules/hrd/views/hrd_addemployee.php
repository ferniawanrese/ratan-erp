
					 <div class="col-md-12">
							<ul class="nav nav-pills nav-justified thumbnail setup-panel">
								<li class="active"><a href="#step-1">
									General Information
								</a></li>
								<li ><a href="#step-2">
									Personal Information
								</a></li>
								<li><a href="#step-last">
									Note
								</a></li>
							</ul>
						</div>
						
						<div class="form-container">
							<form id="stepy_form" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/hrd_save_employee/');?>" method="post">
								<div class="row setup-content " id="step-1">
										
												<input name="employee_hexaID" type="hidden" value = "<?php echo $data_detail[0]['employee_hexaID'];?>"/>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Name :</label>
													<div class="control col-md-6">
														<input name="employee_name"  id = "employee_name" class="form-control {validate:{required:true}}" type="text" placeholder = "Full Name" value = "<?php echo $data_detail[0]['employee_name'];?>"/>
													</div>
												</div>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Email Address :</label>
													<div class="control col-md-4">
														<input name="employee_email"  id = "employee_email" class="form-control  {validate:{required:true,email:true}}" type="email" placeholder = "email" value = "<?php echo $data_detail[0]['employee_email'];?>"/>
														
														
													</div>
												</div>
												 
												<div class="form-group ">
													<label  class="col-sm-3 control-label">Department : </label>
													<div class="control col-sm-4 col-md-4" data-validate="number">
														 <span class = "input-group  ">
														
															<select id = "department_ID" name="department_ID"  class="form-control"> 
																<option >-- Choose Department --</option>
																	<?php foreach($department_data as $dep):?>
																		<?php if($dep['department_parentID'] == 0):?>
																			<option value = "<?php echo  $dep['department_ID'];?>"><?php echo  $dep['department_name'];?></option>
																		<?php else:?>
																			<option value="<?php echo  $dep['department_ID'];?>"><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
																		<?php endif;?>										
																	<?php endforeach;?>	  
															</select>
														 
															<span class="input-group-addon ">
																<i class="icon-plus " style="cursor:pointer;" title="Ascending"></i>
															</span>
														</span>
													</div>
												</div>
												
				
											 
												<div class="form-group ">
													<label  class="col-sm-3 control-label">Position : </label>
													<div class="control col-sm-4 col-md-4" data-validate="number">
														 <span class = "input-group  ">
														
															<select id = "job_ID" name="job_ID"  class="form-control"> 
																<option >-- Choose Position --</option> 
															</select>
														 
															<span class="input-group-addon ">
																<i class="icon-plus " style="cursor:pointer;" title="Ascending"></i>
															</span>
														</span>
													</div>
												</div>
	 
<script>
$(function() {
	$( "#employee_managerID" ).autocomplete({ 
	 
		source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('#employee_managerID').val(),
		   
	}); 
}); 
 
</script>  
	
												<div class="form-group">
													<label  class="col-sm-3 control-label">Manager :</label>
													<div class="control col-md-6">
														<input id = "employee_managerID" name="employee_managerID" class="form-control" type="text" value = "<?php echo $data_detail[0]['employee_managerID'];?>"/>														
													</div>
												</div>
	 

		
																				 
<script>

	$( "select#department_ID" ).change(function() {
		
		var a = $('select#department_ID option:selected').val();
		 
		$.ajax({
			
			url: "<?php echo base_url('hrd/get_position/');?>" + '/' +a,
			
			
			success: function (data) {
			$( "#job_ID" ).html("<option value = '-1'>-- Choose Position --</option>");
			var jsonData = JSON.parse(data);
				optmin = "<option value = '-1'>-- Choose Position --</option>";
				for (var i = 0; i < jsonData.positionnya.length; i++) {
					var datanya = jsonData.positionnya[i];
					
					if(datanya.job_ID > 0){
						
							optmin += "<option value ='"+ datanya.job_ID +"'>"+ datanya.job_name +"</option>";
							
					}
											
					$( "#job_ID" ).html(optmin); 
				}
				
			}
		});
		
	});
	

var availableTags = [
	"ActionScript",
	"AppleScript",
	"Asp",
	"BASIC",
	"C",
	"C++",
	"Clojure",
	"COBOL",
	"ColdFusion",
	"Erlang",
	"Fortran",
	"Groovy",
	"Haskell",
	"Java",
	"JavaScript",
	"Lisp",
	"Perl",
	"PHP",
	"Python",
	"Ruby",
	"Scala",
	"Scheme"
];
$( "#employee_managerID" ).autocomplete({
	source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $("#employee_managerID").val(),
});
	 
</script>
												
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
																<?php else:?>	
																	<img alt="img" src="<?php echo base_url('images/upload-icon.png');?>">
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
												
								</div>	
								<div class="row setup-content " id="step-2">			
											<fieldset title="Step 2">
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">SSN No :</label>
													<div class="control col-md-6">
														<input type="text" id = "employee_SSN" name = "employee_SSN" value = "<?php echo $data_detail[0]['employee_SSN'];?>" class="form-control" placeholder="Social Security Number" class="input-large">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Passport No :</label>
													<div class="control col-md-6">
														<input type="text" name = "employee_passport_no" id = "employee_passport_no" value = "<?php echo $data_detail[0]['employee_passport_no'];?>" class="form-control" placeholder="Passport Number" class="input-large">
													</div>
												</div>
												
												<div class="form-group">
													<label  class="col-sm-3 control-label">Gender :</label>
													<div class="control col-md-3">
														<select name = "employee_gender" id = "employee_gender" class="form-control">
															<?php if($data_detail[0]['employee_gender']){
															echo '<option value = "'.$data_detail[0]['employee_gender'].'" selected disabled>'.$data_detail[0]['employee_gender'].'</option>' ;};?>
															
															<option value = "Male">Male</option>
															<option value = "Female">Female</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-3 control-label">Blood Group :</label>
													<div class="control col-md-3">
														<select name = "employee_blood" id = 'employee_blood' class="form-control">
															<?php if($data_detail[0]['employee_blood']){
															echo '<option value = "'.$data_detail[0]['employee_blood'].'" selected disabled>'.$data_detail[0]['employee_blood'].'</option>' ;};?>
															
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
															<?php if($data_detail[0]['employee_maritalstat']){
															echo '<option value = "'.$data_detail[0]['employee_maritalstat'].'" selected disabled>'.$data_detail[0]['employee_maritalstat'].'</option>' ;};?>
														
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
															<?php if($data_detail[0]['employee_religion']){
															echo '<option value = "'.$data_detail[0]['employee_religion'].'" selected disabled>'.$data_detail[0]['employee_religion'].'</option>' ;};?>
														
															<option value = "Islam">Islam</option>
															<option value = "Katholik">Katholik</option>
															<option value = "Protestan">Protestan</option>
															<option value = "Hindu">Hindu</option>
															<option value = "Budha">Budha</option>
															<option value = "Other">Other</option>
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
												
												
												
												
								</div>
								<div class="row setup-content " id="step-last">
								
												<div class="form-group">
													<label  class="col-sm-3 control-label">Employee Notes :</label>
													<div class="control col-md-6">
														<textarea name = "employee_notes" id = "employee_notes"  class="form-control {validate:{required:true}}"><?php echo $data_detail[0]['employee_notes'];?></textarea>
													</div>
												</div>
												<div class = "pull-right">
													
													<button class="alert-box btn" type = "submit" >Finish</button>
													
												</div>
								</div >
								
							</form>
						</div>
					
	<!-- dialog contents on hidden div -->   

	<div id="modal-content" class="hide">
		<div id="modal-body">
			<input type="text" name="asd" id="id">
		</div>
	</div>

<script type="text/javascript">
            
			cek_validate();
			function cek_validate(){
				
				 var container = $('div.error-container ');
                // validate the form when it is submitted
                var validator = $(".form-validate").validate({
                    errorContainer: container,
                    errorLabelContainer: $("ol", container),
                    wrapper: 'span',
                    meta: "validate"
                });
				
                $(".cancel").click(function () {
                    validator.resetForm();
                });
			}
</script>
<!-- script ajax save -->



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
    
   
});

 $('#datetimepicker4').datetimepicker({
            pickTime: false
        });
</script>



						
							
