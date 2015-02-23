<form  id = "form_add" class="form-horizontal form-validate"   method="post">  
		<input name="leave_ID"  id = "leave_ID" class="form-control " type="hidden"  value = "<?php echo $leave_detail[0]['leave_ID'];?>"   />
		<div class="form-group">
			<label  class="col-sm-3 control-label">Employee :</label>
			<div class="control col-md-6">
				<input name="employee"  id = "employee" class="form-control employee {validate:{required:true}}" type="text"  value = "<?php echo $leave_detail[0]['employee_name'];?>"  /> 
				<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"  value = "<?php echo $leave_detail[0]['employee_ID'];?>"   />
			</div>
		</div>
		
		<div class="form-group">
			<label  class="col-sm-3 control-label"> Leave Type:</label>
			<div class="control col-md-4">
				<select class = "form-control" type = "text" id = "leave_typeID" name = "leave_typeID"> 
					<?php foreach($leave_type as $type):?>
					<?php if($type['leave_typeID']==$leave_detail[0]['leave_typeID']){$selected = "selected";}else{$selected = "";};?> 
					<option value = "<?php echo $type['leave_typeID'];?>" <?php echo $selected;?> ><?php echo $type['leave_type_name'];?></option>
					<?php endforeach;?> 
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label  class="col-sm-3 control-label">Start Date :</label>
			<div class="control col-md-3">
				<?php if($leave_detail[0]['date_start']){$datenya = date("d-m-Y", strtotime($leave_detail[0]['date_start']));}else{$datenya = date('d-m-Y');};?>
				<input  type="text" class = "form-control datepicker {validate:{required:true}}" id = "date_start" name = "date_start" value = "<?php echo $datenya;?>">
			</div>
		</div>
		
		<div class="form-group">
			<label  class="col-sm-3 control-label">End Date:</label>
			<div class="control col-md-3">
				<?php if($leave_detail[0]['date_end']){
				$datenya2 = date("d-m-Y", strtotime($leave_detail[0]['date_end']));}
				else{$datenya2 = date('d-m-Y');};?> 
				<input  type="text" class = "form-control datepicker {validate:{required:true}}" id = "date_end" name = "date_end" value = "<?php echo $datenya2;?>">
			</div>
		</div>
		 
		<div class="form-group">
			<label  class="col-sm-3 control-label">Note:</label>
			<div class="control col-md-6">
				<textarea class = "form-control" id = "note" name = "note"><?php echo $leave_detail[0]['note'];?></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label  class="col-sm-3 control-label"> </label>
			<div class="control col-md-4">  
				<button class="alert-box btn" type = "submit" >Finish</button>
			</div> 
		</div>
</form>

<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">

<script> 

$('#validate_error').val('0'); //wawan 

$('#date_end').datepicker({
  format:"dd-mm-yyyy"
});  

$('#date_start').datepicker({
  format:"dd-mm-yyyy"
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
			

$("form#form_add").submit(function(e){

	if($('#validate_error').val()==1){
		return false;
	}
		 
			e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/leaves_add_action');?>",
				data: $("#form_add").serialize(),
				success: function(data)
				{
					$('#myModal').modal('hide');	
					what_next_leave_add(); 
					NProgress.done(true);
				}
			});
});	


$(function() {
		$( ".employee" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#employee_ID").val(id);
				}  
		}); 
	}); 
	

</script>