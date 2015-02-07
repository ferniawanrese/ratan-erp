<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
						<input name="UoM_ID"  id = "UoM_ID" class="form-control " type="hidden"  value = "<?php echo $uom_data[0]['UoM_ID'];?>"  /> 	 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> UoM Name:</label>
							<div class="control col-md-4">
								<input name="uom_name"  id = "uom_name" class="form-control " type="text"  value = "<?php echo $uom_data[0]['uom_name'];?>"  /> 
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
	 
	$("form#catAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/uom_add_action/');?>",
				data: $("#catAdd").serialize(),
				success: function(data)
				{ 
					$('#myModal').modal('hide');
					what_next(); 
				}
			});
			
			return false;
	});
	
		 
</script>