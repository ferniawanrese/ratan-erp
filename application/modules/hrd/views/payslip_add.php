	<label class = "pull-right"><font size = "3"><?php echo $dat[0]['employee_name'];?> <?php echo $dat[0]['employee_badge'];?>  </font></label>

	<span class = "col-md-12" >	
		<!-- searching -->
		<form id = "form_general" name="form_general" method="post" >
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
	<label>Basic Salary : IDR <?php echo $dat[0]['employee_salary'];?></label>
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching -->
		 <form id = "form_filter" name="form_filter" method="post">
			<fieldset class="default panel">
					<legend> Allowance </legend>
				 
				 </br>
				 <?php foreach($allowance as $allow):?>
				 <div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">   
							<?php echo $allow['allowance_name'];?> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description"> 
					</div> 
				</div>
					
				 <?php endforeach;?>
					   
				</fieldset>
		</form>	
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching -->
		 <form id = "form_filter" name="form_filter" method="post">
			<fieldset class="default panel">
					<legend> Deduction </legend>
					 </br> 
				<?php foreach($deduction as $ded):?>	 
				 <div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">  
							<?php echo $ded['allowance_name'];?> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description">  
					</div>
				</div>
				<?php endforeach;?>	 
					
			</fieldset>
		</form>	
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching -->
		 <form id = "form_filter" name="form_filter" method="post">
			<fieldset class="default panel">
					<legend> Attendance </legend>
					 </br>
					 
				<div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4"> 
							Absent Days 
					</div>  
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0" name="filter[description]" id = "description">  
					</div>
				</div>  
				<div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">    
							Deduction 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description">  
					</div>
				</div> 	
			</fieldset>
		</form>	
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching -->
		 <form id = "form_filter" name="form_filter" method="post">
			<fieldset class="default panel">
					<legend> Tax </legend>
				 
					</br>
				
				<?php foreach($taxs as $tax):?>	
				<div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">    
							<?php echo $tax['tax_name'];?> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description">  
					</div>
				</div>
				<?php endforeach;?>	 
					     
			</fieldset>
		</form>	
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching -->
		 <form id = "form_filter" name="form_filter" method="post">
			<fieldset class="default panel">
					<legend> Summary </legend>
					</br>
						<div class="input-group col-sm-12 col-md-12">
							<div class="form-group col-sm-12 col-md-4">   
									Total Allowance 
							</div> 
							<div class="form-group col-sm-12 col-md-8">   
									<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description">  
							</div> 
						</div> 		
						<div class="input-group col-sm-12 col-md-12">
							<div class="form-group col-sm-12 col-md-4">    
									Total Deduction 
							</div> 
							<div class="form-group col-sm-12 col-md-8">    
									<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description">  
							</div> 
						</div>
						<div class="input-group col-sm-12 col-md-12">						
							<div class="form-group col-sm-12 col-md-4">   
									Total Tax 
							</div> 
							<div class="form-group col-sm-12 col-md-8">    
									<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description">  
							</div>
						</div>	
						<div class="input-group col-sm-12 col-md-12">
							<div class="form-group col-sm-12 col-md-4">    
									Take Home Salary 
							</div> 
							<div class="form-group col-sm-12 col-md-8">    
									<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description">  
							</div>
						</div>	
					</div> 	
			</fieldset>
		</form>	
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
					 
					NProgress.done(true);
				}
			});
});	
</script>