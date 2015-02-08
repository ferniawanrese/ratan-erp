<form  id = "form-dateallow" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
	<input name="leave_type_dateID"  id = "leave_type_dateID"   type="hidden" value = "<?php echo $leave_type_date[0]['leave_type_dateID'];?>"   /> 			 	
	 
	<div class="form-group">
		<label  class="col-sm-3 control-label">Date Allow:</label>
		<div class="control col-md-4">
			<input id = "date_allow" name="date_allow" class="form-control datepicker" type="text" value = "<?php echo $leave_type_date[0]['date_allow'];?>"/>
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Note:</label>
		<div class="control col-md-6">
			<input name="note"  id = "note" class="form-control" type="text" value = "<?php echo $leave_type_date[0]['note'];?>"/> 
		</div>
	</div>
	  
	<div class="form-group">
		<label  class="col-sm-3 control-label"> </label>
		<div class="control col-md-4">
			<button class="alert-box btn" type = "submit" >Finish</button>
		</div> 
	</div>
						
</form>

<script>

$("form#form-dateallow").submit(function(e){
		
		if($('#leave_type_dateID').val()==""){
			//e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/leave_type_datedetail_action');?>",
				data: $("#form-dateallow").serialize(),
				success: function(data)
				{
					$('#myModal').modal('hide');
					$('#nodata').hide();
					
					$( "#draft" ).append(data); 
					
					NProgress.done(true);
				}
			});
		}else{
			 /*
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/leave_type_datedetail_update');?>",
				data: $("#form-dateallow").serialize(),
				success: function(data)
				{
					$('#myModal').modal('hide');
					
					NProgress.done(true);
				}
			});
			*/
			
			
		}
			return false;
	});
	 
</script>
 <script>
  $('#date_allow').datepicker({
  format:"dd-mm-yyyy"
  });
  
</script>	
<style>
.datepicker{z-index:1151 !important;}
</style>
 