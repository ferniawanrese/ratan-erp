 
			<form  id = "form_add" class="form-horizontal form-validate"   method="post"> 
						<input name="leave_typeID"  id = "leave_typeID" class="form-control " type="hidden"  value = "<?php echo $leave_date[0]['leave_typeID'];?>"  /> 	 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Leave Type:</label>
							<div class="control col-md-4">
								<input name="leave_type_name"  id = "leave_type_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $leave_date[0]['leave_type_name'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Description:</label>
							<div class="control col-md-4">
								<textarea class = "form-control {validate:{required:true}}" id = "description" name = "description"><?php echo $leave_date[0]['description'];?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Limit Days:</label>
							<div class="control col-md-4">
								<input name="limit_days"  id = "limit_days" class="form-control numonly" type="text"  value = "<?php echo $leave_date[0]['limit_days'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Payroll Deduction: </label>
							<div class="control col-md-2">
								<select class = "form-control" name = "payroll_deduction" id = "payroll_deduction">
								<?php if($leave_date):?>
									<?php if($leave_date[0]['payroll_deduction']==1):?>
									<option value = "<?php echo $leave_date[0]['payroll_deduction'];?>" selected disabled="disabled" >Yes</option>
									<?php endif;?>
									<?php if($leave_date[0]['payroll_deduction']==0):?>
									<option value = "<?php echo $leave_date[0]['payroll_deduction'];?>" selected disabled="disabled" >No</option>
									<?php endif;?>
								<?php endif;?>
								
								<option value = "0">No</option>
								<option value = "1">Yes</option>
								</select>
							</div>
						</div> 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Color Date: </label>
							<div class="control col-md-2">
								<select class = "form-control" name = "date_color" id = "date_color">
								 
									<?php if($leave_date[0]['date_color']!=""):?>
									<option value = "<?php echo $leave_date[0]['date_color'];?>" selected disabled="disabled" ><?php echo $leave_date[0]['date_color'];?></option>
									<?php endif;?> 
									
									<option value = "red"  >Red</option>
									<option value = "yellow"  >Yellow</option>
									<option value = "green" >Green</option>
									 
								</select>
							</div>
						</div> 
						
						<div class="stepy-widget"> 
							<div class="widget-container gray ">
								Date Available <button class="btn btn-blue icon-plus" onclick="add_detail()" type="button" data-target="#myModal" data-toggle="modal"  > Add</button><div></br></div>
								 <table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
									<thead>
										  <tr>  
												<th> Date </th> 
												<th> Note </th>  
												<th> Action </th>
										  </tr>
									</thead> 
									<tbody id = "draft">
									 
									<?php if($date_detail):?>
										<?php foreach($date_detail as $det):?> 
											<input type = "hidden" id = "det_deleted<?php echo $det['leave_type_dateID'];?>" name = "date_detail[<?php echo $det['leave_type_dateID'];?>][deleted]" 
												value = "0"> 
											<input type = "hidden" id = "date_detail[<?php echo $det['leave_type_dateID'];?>][leave_type_dateID]" name = "date_detail[<?php echo $det['leave_type_dateID'];?>][leave_type_dateID]"  
												value = "<?php echo $det['leave_type_dateID'];?>" > 
												 
											<tr id = "<?php echo $det['leave_type_dateID'];?>">
												<td>
												 
												<span id = "det_<?php echo $det['leave_type_dateID'];?>"><?php echo date("d-m-Y", strtotime($det['date_allow']));?></span>
												<input type = "hidden" id = "date_detail_det<?php echo $det['leave_type_dateID'];?>" name = "date_detail[<?php echo $det['leave_type_dateID'];?>][date_allow]" 
												value = "<?php echo $det['date_allow'];?>">
												</td>
												<td>
												
												<span id = "note_<?php echo $det['leave_type_dateID'];?>"><?php echo $det['note'];?></span>
												<input type = "hidden" id = "date_detail_note<?php echo $det['leave_type_dateID'];?>" name = "date_detail[<?php echo $det['leave_type_dateID'];?>][note]" value = "<?php echo $det['note'];?>">
												</td>
												<td class="center">
														<div class="btn-toolbar row-action"> 
																<button class="btn btn-info" title="Edit" onclick="add_detail('<?php echo $det['leave_type_dateID'];?>')" type="button" data-target="#myModal" data-toggle="modal"><i class="icon-edit"></i></button>
																<button class="delete btn btn-danger" title="Delete" onclick=delete_draft("<?php echo $det['leave_type_dateID'];?>")><i class="icon-trash "></i></button> 
														</div>
												 </td>
											</tr> 
										<?php endforeach;?>
									
									<?php else:?>
										<tr id = "nodata" class =  "nodata">
											<td colspan = "3"><center>No Specific Day</center></td>
										</tr> 
									<?php endif;?>		 
									</tbody> 
								</table> 
							</div> 
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> </label>
							<div class="control col-md-4">  
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
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
	
	$("form#form_add").submit(function(e){
	 
		//e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/leave_type_add_action');?>",
				data: $("#form_add").serialize(),
				success: function(data)
				{
					display_data();
					NProgress.done(true);
				}
			});
			
			return false;
	});
	  
	
	
function add_detail(a){
	 $.ajax({
			 url: "<?php echo base_url('hrd/leave_type_datedetail/');?>"+"/"+a,
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Date Available"); 		 
			}  
	 
	 })
 }	 
 
 
function delete_draft(a){
	
	$("#det_deleted"+a).val('1');
	$("#"+a).remove();
	 
}
 
</script>