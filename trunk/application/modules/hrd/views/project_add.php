<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
						<input name="project_ID"  id = "project_name" class="form-control " type="hidden"  value = "<?php echo $dat[0]['project_ID'];?>"  /> 	 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Project Name:</label>
							<div class="control col-md-4">
								<input name="project_name"  id = "project_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['project_name'];?>"  /> 
							</div>
						</div>
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Department:</label>
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
							<label  class="col-sm-3 control-label"> Status:</label>
							<div class="control col-md-4">  
									<select class = "form-control" id = "status" name = "status"> 
										<option  >active</option>
										<option  >finish</option>									
										<option  >pending</option>
									</select>  
							</div>
						</div> 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Billable :</label>
							<div class="control col-md-4">
								<input name="billable"  id = "billable" class="form-control numonly" type="text"  value = "<?php echo $dat[0]['billable'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
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

<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">
 

<script>
 
	$(document).ready(function () {

	document.getElementById('project_name').focus();
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

	$('#parent').on('change', function() {
	  var a= this.value;
	  if(a !=-1){
	   //  $('#parent_new').attr("disabled", true);
	  $('#parent_new').hide();
	  }else{
	  $('#parent_new').show(); 
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
  
	$("form#catAdd").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/project_add_action/');?>",
				data: $("#catAdd").serialize(),
				success: function(data)
				{ 
					$('#myModal').modal('hide');
					what_next2(); 
				}
			});
			
			return false;
	});
	
		  
 function add_department(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/department_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		 
			$( "#modal_label" ).html("Add Department"); 	
			}  
	 
	 })
 }
	
</script>