<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
						<input name="project_ID"  id = "project_name" class="form-control " type="hidden"  value = "<?php echo $dat[0]['project_ID'];?>"  /> 	 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Project Name:</label>
							<div class="control col-md-4">
								<input name="project_name"  id = "project_name" class="form-control " type="text"  value = "<?php echo $dat[0]['project_name'];?>"  /> 
							</div>
						</div>
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Department:</label>
								<div class="control col-md-4">
										 <select id = "department_ID" name="department_ID"  class="form-control"> 
												<option >-- Choose Department --</option>
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
								<input name="billable"  id = "billable" class="form-control " type="text"  value = "<?php echo $dat[0]['billable'];?>"  /> 
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
 

<script>
	$('#parent').on('change', function() {
	  var a= this.value;
	  if(a !=-1){
	   //  $('#parent_new').attr("disabled", true);
	  $('#parent_new').hide();
	  }else{
	  $('#parent_new').show(); 
	  }
	});
  
	$("form#catAdd").submit(function(e){
	
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