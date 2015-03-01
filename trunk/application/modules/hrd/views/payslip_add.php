	<label class = "pull-right"><font size = "3"><?php echo $dat[0]['employee_name'];?> <?php echo $dat[0]['employee_badge'];?>  </font></label>

	<span class = "col-md-12" >	
		<!-- searching -->
		<form id = "form_general" name="form_general" method="post" >
			<input type = "hidden" id = "employee_badge" name = "employee_badge" value = "<?php echo $dat[0]['employee_badge'];?>" >
			<input type = "hidden" id = "employee_ID" name = "employee_ID" value = "<?php echo $dat[0]['employee_ID'];?>" >
			<fieldset class="default panel">
					<legend> Payslip Period</legend>
					 
					<div class="form-group col-sm-12 col-md-3">  
					<label for="validate-text"></label>
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control datepicker" type="text" placeholder="Date Start" name="date_start" id = "date_start"> 
						</div> 
					</div>
					  
					<div class="form-group col-sm-12 col-md-3">  
					<label for="validate-text"></label>
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control datepicker" type="text" placeholder="Date End" name="date_end" id = "date_end"> 
						</div> 
					</div>
					 
					<div class="form-group col-sm-12 col-md-3"> 
						<label for="validate-number"></label>
						<div class="input-group col-sm-12 col-md-12">
							<span class = "btn-group">
								<button type = "submit" class="btn btn-default"  > Generate</buttton> 
							</span>
						</div>
					</div>
					 
				</fieldset>
		</form>	
	</span>
	
	<span class = "col-md-12" >	
		<div id = "contentnya" nmae = "contentnya"></div>
	</span>
	
	<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">
	
<script>
 
$('#date_end').datepicker({
  format:"dd-mm-yyyy"
});  

$('#date_start').datepicker({
  format:"dd-mm-yyyy"
});  


$("form#form_general").submit(function(e){

	if($('#validate_error').val()==1){
		return false;
	}
		 
			e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/generate_payroll');?>",
				data: $("#form_general").serialize(),
				success: function(data)
				{
					 
					$("#contentnya").html(data); 		
					NProgress.done(true);
				}
			});
});	
</script>