
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
                
            });
        </script> 
		 
		
	<form  id = "applicantAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
				
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
					
					<div class="form-group ">
						<label  class="col-sm-3 control-label">Department : </label>
						<div class="control col-sm-4 col-md-4" data-validate="number">
							 <span class = "input-group  "> 
								<select id = "department_ID" name="department_ID"  class="form-control {validate:{required:true}}"> 
									<option  value="">-- Choose Department --</option>
										<?php foreach($department_data as $dep):?>
										 
											<?php if($dep['department_parentID'] == '0'):?>
												<option value = "<?php echo  $dep['department_ID'];?>"  ><?php echo  $dep['department_name'];?></option>
											<?php else:?>
												<option value="<?php echo  $dep['department_ID'];?>"  ><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
											<?php endif;?>										
										<?php endforeach;?>	  
								</select>
							 
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
								</span>
							</span>
						</div>
					</div> 
					<div class="form-group ">
						<label  class="col-sm-3 control-label">Job Position : </label>
						<div class="control col-sm-4 col-md-4" data-validate="number">
							 <span class = "input-group  ">
							
								<select id = "job_ID" name="job_ID"  class="form-control {validate:{required:true}}"> 
									<option value="">-- Choose Position --</option> 
									 <?php if($data_detail[0]['job_ID']!=""):?>
									 <option value = "<?php echo $data_detail[0]['job_ID'];?>" selected><?php echo $data_detail[0]['job_name'];?></option> 
									 <?php endif;?>
								</select>
							 
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_position()"></i>
								</span>
							</span>
						</div>
					</div>
					 
					<div class="form-group">
						<label  class="col-sm-3 control-label">Stage :</label>
						<div class="control col-md-4">  
								<select class = "form-control" id = "stage" name = "stage">
									<option>Initial Qualification</option>
									<option>Fisrt Interview</option>
									<option>Second Interview</option>
									<option>Contract Porposed</option>
									<option>Refused</option> 
								</select>  
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Employee Responsible :</label>
						<div class="control col-md-4">
							<input class="form-control responsible_name" type="text"    /> 
							<input id = "responsible_ID" name="responsible_ID"  class = "responsible_ID" type="hidden"   value = "<?php //echo $data_detail[0]['responsible_ID'];?>" />
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
															<select class = "form-control" id = "degree" name = "degree">
																<option>Graduate</option>
																<option>Bachelor Degree</option>
																<option>Master Degree</option>
																<option>Doctoral Degree</option>
															</select> 
														</span>
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-3 control-label">Appreciation :</label>
													<div class="control col-md-4"> 
															<select class = "form-control" name = "appreciation" id="appreciation">
																<option>Not Good</option>
																<option>On Avarage</option>
																<option>Good</option>
																<option>Very Good</option>
																<option>Excelent</option>
															</select> 
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
  
	$("form#applicantAdd").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/applicant_add_action/');?>",
				data: $("#applicantAdd").serialize(),
				success: function(data)
				{ 
					$('#myModal').modal('hide');
					 
				}
			});
			
			return false;
	});
 
$(function() {
		$( ".responsible_name" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.responsible_name').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#responsible_ID").val(id);
				}  
		}); 
	}); 
	 

$( "select#department_ID" ).change(function() {
		
		var a = $('select#department_ID option:selected').val();
		 
		$.ajax({
			
			url: "<?php echo base_url('hrd/get_position/');?>" + '/' +a,
			
			
			success: function (data) {
			$( "#job_ID" ).html("<option value = ''>-- Choose Position --</option>");
			var jsonData = JSON.parse(data);
			 
				optmin = "<option value = ''>-- Choose Position --</option>";
				for (var i = '0'; i < jsonData.positionnya.length; i++) {
					var datanya = jsonData.positionnya[i];
					
					if(datanya.job_ID > '0'){
						
							optmin += "<option value ='"+ datanya.job_ID +"'>"+ datanya.job_name +"</option>";
							
					}
											
					$( "#job_ID" ).html(optmin); 
				}
				
			}
		});
		
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
  
 function add_position(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/job_position_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Position"); 		 
			}  
	 
	 })
 }
  
  $('#date_closed').datepicker({
  format:"dd-mm-yyyy"
  });
  
  
  
</script>						
				


