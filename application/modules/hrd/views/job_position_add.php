<form  id = "jobAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
						<input name="job_ID"  id = "job_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['job_ID'];?>"  /> 	 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Department :</label>
							<div class="control col-md-4">
								 <select id = "department_ID" name="department_ID"  class="form-control {validate:{required:true}}"> 
										<option value = "">-- Choose Department --</option>
											<?php foreach($department_data as $dep):?>
											<?php if($dep['department_ID']==$dat[0]['department_ID']){$selected = "selected";}else{$selected = "";}?>
												<?php if($dep['department_parentID'] == '0'):?>
													<option value = "<?php echo  $dep['department_ID'];?>" <?php echo $selected;?>><?php echo  $dep['department_name'];?></option>
												<?php else:?>
													<option value="<?php echo  $dep['department_ID'];?>"  <?php echo $selected;?>><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
												<?php endif;?>	
												
											<?php endforeach;?>	  
									</select>
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Job Name :</label>
							<div class="control col-md-4">
								<input name="job_name"  id = "job_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['job_name'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Job Description :</label>
							<div class="control col-md-4">
								<input name="job_desc"  id = "job_desc" class="form-control " type="text"  value = "<?php echo $dat[0]['job_desc'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Job Requirement :</label>
							<div class="control col-md-6">
								<textarea class="form-control " id = "job_requirement" name = "job_requirement"><?php echo $dat[0]['job_requirement'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Job Expected Num Requirement :</label>
							<div class="control col-md-2">
								<input name="job_expected_requirement"  id = "job_expected_requirement" class="form-control numonly {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['job_expected_requirement'];?>"   /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
						</div>
						
</form>

<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">

<script>

$(document).ready(function () {
 
  //called when key is pressed in textbox
  $(".numonly").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which != 46 || $(this).val().indexOf('.') != -1) && (e.which < 48 || e.which > 57)) {
        //display error message
       // $("#errmsg").html("Digits Only ").show().fadeOut("slow");
               return false;
    }
   });
}); 

$('#validate_error').val('0'); //wawan 

	$('#parent').on('change', function() {
	  var a= this.value;
	  if(a !=-1){
	  $('#parent_new').attr("disabled", true);
	  }else{
	  $('#parent_new').attr("disabled", false);
	  }
	});
  
	

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
			 
	$("form#jobAdd").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/job_position_add_action/');?>",
				data: $("#jobAdd").serialize(),
				success: function(data)
				{
					
					$('#myModal').modal('hide'); 
					what_next2(); 
					
				}
			});
			
			return false;
	});
	
	
</script>