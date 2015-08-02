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
		 

	<form  id = "form-meeting" class="form-horizontal form-validate" enctype="multipart/form-data" method="post">
			<!--<input name="customer_ID"  id = "customer_ID"   name = "customer_ID" type="hidden" value = "<?php //echo $crm[0]['customer_ID'];?>"   />			-->	  
						<div class="form-group">
							<label  class="col-sm-4 control-label">Meeting Title :</label>
							<div class="control col-md-4">
								<input name="meeting_title"  id = "meeting_title" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $crm[0]['meeting_title'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Summary :</label>
							<div class="control col-md-4">
								<input name="summary"  id = "summary" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $crm[0]['summary'];?>"  /> 
							</div>
						</div>
					 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Start Date :</label>
							<div class="control col-md-2">
								<input  type="text" class = "form-control datepicker {validate:{required:true}}" id = "start_date" name = "start_date" value = "">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">End Date :</label>
							<div class="control col-md-2">
								<input  type="text" class = "form-control datepicker {validate:{required:true}}" id = "end_date" name = "end_date" value = "">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">All Day :</label>
							<div class="control col-md-2">
								<input type = "checkbox" id = "allday" name = "allday">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Duration :</label>
							<div class="control col-md-2">
								<input name="duration"  id = "duration" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $crm[0]['duration'];?>"  placeholder="00:00"/> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Location :</label>
							<div class="control col-md-4">
								<textarea  id = "location" name = "location"class="form-control "><?php echo $crm[0]['location'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Reminder :</label>
							<div class="control col-md-4">
								<select class="form-control" name = "reminder" id ="reminder">
									<option>None</option>
									<option>1 minute before</option>
									<option>5 minutes before</option>
									<option>10 minutes before</option>
									<option>15 minutes before</option>
									<option>20 minutes before</option>
									<option>25 minutes before</option>
									<option>30 minutes before</option>
									<option>35 minutes before</option>
									<option>40 minutes before</option>
									<option>45 minutes before</option>
									<option>1 hour before</option>
									<option>2 hours before</option>
									<option>3 hours before</option>
									<option>4 hours before</option>
									<option>5 hours before</option> 
								</select>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Recurrent :</label>
							<div class="control col-md-2">
								<input type = "checkbox" id = "recurrent" name = "recurrent" >
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
								<fieldset title="Meeting">
									<legend>Meeting detail</legend>
									 <span class = "data_load">
										<div class="col-md-6">	 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Responsible :</label>
													<div class="control col-md-8">
														<input id = "responsible_name"   class="form-control responsible_name" type="text" value = "<?php //if($manager_name[0]['employee_name']){echo $manager_name[0]['employee_name']."/".$manager_name[0]['employee_badge'];};?>"/>
														<input id = "responsible_ID" name="responsible_ID"  class = "responsible_ID" type="hidden"   value = "<?php //echo $data_detail[0]['manager_ID'];?>" />
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Partner :</label>
													<div class="control col-md-8">
														<input id = "partner_name"    class="form-control partner_name" type="text" value = "<?php //if($manager_name[0]['employee_name']){echo $manager_name[0]['employee_name']."/".$manager_name[0]['employee_badge'];};?>"/>
														<input id = "partner_ID" name="partner_ID"  class = "partner_ID" type="hidden"   value = "<?php //echo $data_detail[0]['manager_ID'];?>" />
													</div>
												</div> 
												 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Description :</label>
													<div class="control col-md-8">
														<textarea class = "form-control" name = "description" id ="description"></textarea>
													</div>
												</div> 
												 
										</div>
										<div class="col-md-6">	 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Contact  :</label>
													<div class="control col-md-8">
														<input  id = "contact" class="form-control " type="text" value = "<?php //echo $applicant_detail[0]['contact'];?>"   /> 
													</div>
												</div> 
												<div class="form-group">
													<label  class="col-sm-4 control-label">Email :</label>
													<div class="control col-md-8">
														<input class="form-control " type="text"  id="email"  /> 
													</div>
												</div> 
												 
										</div>
									 </span>
								</fieldset> 
								 
								<fieldset title="Invitations detail">
									<legend>  Invitations detail</legend>
									<span class = "data_load">
										<div class="col-md-12">	 
											<div class="control-group">
												<label class="control-label"></label>
												
												<div class="form-group"> 
													<div class="control col-md-12">
													Invitation details <button class="btn btn-blue icon-plus" onclick="add_detail()" type="button" data-target="#myModal" data-toggle="modal"  > Create</button><div></br></div>
						
														<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
															<thead>
																  <tr> 
																		<th>  To </th> 
																		<th>  Role </th>  
																		<th> Action </th> 
																  </tr>
															</thead> 
															
															<tbody id = "draft">
															</tbody> 
														</table>
													</div>
												</div> 
												
											</div>
										</div>
									</span>
								</fieldset>
								
								<button type="submit" class="finish btn btn-extend"> Finish!</button>
								</br>
							</span>
						</div>
						
</form>

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
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button></br>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<input type = "hidden" id = "validate_error"  class = "validate_error" value = "0">

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
	
	 
	
	$('#start_date').datepicker({
  format:"dd-mm-yyyy"
});  
$('#end_date').datepicker({
  format:"dd-mm-yyyy"
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
	
	$(function() {
		$( ".partner_name" ).autocomplete({ 
		 
			source: "<?php echo base_url('crm/get_partner_name/');?>" + "/" + $('.responsible_name').val(),
				select: function (event, ui) {
				var id = ui.item.partner_ID;
				$("#partner_ID").val(id);
				}  
		}); 
		
		
	}); 
	
	 function add_detail(a){
		 $.ajax({
				 url: "<?php echo base_url('crm/invitation_detail_add/');?>"+"/"+a,
				success: function(data){      
				$( "#modal_body" ).html(data); 		
				$( "#modal_label" ).html("Invitation details"); 		 
				}  
		 
		 })
	 }
	 
	 $("form#form-meeting").submit(function(e){

	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('crm/meeting_add_action');?>",
				data: $("#form-meeting").serialize(),
				success: function(data)
				{ 
					NProgress.done(true);
					display_data();
				}
			});
			
			return false;
	});
			
</script>
 