<form  id = "form-invitationdetail" class="form-horizontal form-validate" enctype="multipart/form-data" method="post">
	
	<input name="meeting_invatationID"  id = "meeting_invatationID"   type="hidden" value = "<?php //echo $expends_detail[0]['expense_detaiID'];?>"   />
	
	<input name="draft_stat"  id = "draft_stat"   type="hidden" value = "" />
 
	<div class="form-group">
		<label  class="col-sm-3 control-label">To:</label>
		<div class="control col-md-6">
			<input id = "to_name" name="to_name"   class="form-control to_name" type="text" value = "<?php //if($manager_name[0]['employee_name']){echo $manager_name[0]['employee_name']."/".$manager_name[0]['employee_badge'];};?>"/>
			<input id = "to_ID" name="to_ID"  class = "responsible_ID" type="hidden"   value = "<?php //echo $data_detail[0]['manager_ID'];?>" />													
		</div>
	</div>
	 
	<div class="form-group">
		<label  class="col-sm-3 control-label">Role:</label>
		<div class="control col-md-6">
			<select class="form-control" name = "role" id ="role">
				<option></option>
				<option>Participation Required</option>
				<option>Chair Person</option>
				<option>Optional Participation</option>
				<option>For Information Purpose</option>
			</select>
		</div>
	</div>
	  
	<div class="form-group">
		<label  class="col-sm-3 control-label"> </label>
		<div class="control col-md-4">
			<button class="alert-box btn" type = "submit" >Add</button>
		</div> 
	</div>
						
</form>

<script>
$(function() {
		$( ".to_name" ).autocomplete({  
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.to_name').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#to_ID").val(id);
				}  
		});  
	}); 
	
	$("form#form-invitationdetail").submit(function(e){
	// add detail
	
			var draft_stat = $('#draft_stat').val();
			  
				NProgress.inc();	
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('crm/invitation_detail_add_action');?>"+"/"+draft_stat,
					data: $("#form-invitationdetail").serialize(),
					success: function(data)
					{
						$('#myModal').modal('hide');
						 
						if(draft_stat == ""){
							$( "#draft" ).append(data); 	
						}else{
							
							$( "#"+draft_stat ).html(data); 	
							
						} 
						NProgress.done(true);
					}
				}); 
				
					return false;
	});
			 
</script>