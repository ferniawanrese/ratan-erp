
<span class = "col-md-12" >	
<label>Basic Salary : IDR <?php echo $datnya[0]['employee_salary'] * 1;?></label>
</span>

<span class = "col-md-12" >	
<label>Present : <?php echo $in * 1;?>,</label>
<label>Absent : <?php echo $out * 1;?></label>
</span>

<form id = "form_generate" name="form_filter" method="post">
	
	<span  class = "col-md-6">	
		<!-- searching --> 
			<fieldset class="default panel">
					<legend> Allowance </legend>  
				 </br>
				 <?php foreach($allowance as $allow):?>
				 <div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">   
							<?php echo $allow['allowance_name'];?> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0.00" name="allowance[<?php echo $allow['allowance_ID'];?>]" id = "<?php echo $allow['allowance_ID'];?>"> 
					</div> 
				</div> 
				 <?php endforeach;?> 
				</fieldset> 
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching --> 
			<fieldset class="default panel">
					<legend> Deduction </legend>
					 </br>  
				<?php foreach($deduction as $ded):?>	 
				 <div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">  
							<?php echo $ded['allowance_name'];?> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0.00" name="deduction[<?php echo $allow['allowance_ID'];?>]" id = "<?php echo $allow['allowance_ID'];?>">  
					</div>
				</div>
				<?php endforeach;?>	 
			</fieldset> 
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching --> 
			<fieldset class="default panel">
					<legend> Attendance </legend>
					 </br> 
				<div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4"> 
							Absent Days 
					</div>  
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0"  value = "<?php echo $out;?>">  
					</div>
				</div>  
				<div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">    
							Deduction 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
							<input   class="form-control" type="text" placeholder="0.00" name="deduction[absent]" id = "description" value = "<?php echo $deduction_attendance;?>">  
					</div>
				</div> 	
			</fieldset> 
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching --> 
			<fieldset class="default panel">
					<legend> Tax </legend>
				 
					</br>
				
				<?php foreach($taxs as $tax):?>	
				<div class="input-group col-sm-12 col-md-12">
					<div class="form-group col-sm-12 col-md-4">    
							<?php echo $tax['tax_name'];?> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">    
							<input   class="form-control" type="text" placeholder="0.00" name="tax[<?php echo $tax['tax_ID'];?>]" id = "<?php echo $tax['tax_ID'];?>" value ="<?php echo $wp_montly;?>">  
					</div>
				</div>
				<?php endforeach;?>	 
					     
			</fieldset> 
	</span>
	
	<span  class = "col-md-6">	
		<!-- searching --> 
			<fieldset class="default panel">
					<legend> Summary </legend>
					</br>
						<div class="input-group col-sm-12 col-md-12">
							<div class="form-group col-sm-12 col-md-4">   
									Total Allowance 
							</div> 
							<div class="form-group col-sm-12 col-md-8">    
									<input   class="form-control" type="text" placeholder="0.00" name="total_allowance" id = "total_allowance" value= "<?php echo $total_allowance;?>"> 
							</div> 
						</div> 		
						<div class="input-group col-sm-12 col-md-12">
							<div class="form-group col-sm-12 col-md-4">    
									Total Deduction 
							</div> 
							<div class="form-group col-sm-12 col-md-8">     
									<input   class="form-control" type="text" placeholder="0.00" name="total_deduction" id = "total_deduction" value= "<?php echo $total_deduction;?>"> 
							</div> 
						</div>
						<div class="input-group col-sm-12 col-md-12">						
							<div class="form-group col-sm-12 col-md-4">   
									Total Tax 
							</div> 
							<div class="form-group col-sm-12 col-md-8">     
									<input   class="form-control" type="text" placeholder="0.00" name="totaltax" id = "totaltax" value= "<?php echo $totaltax;?>"> 
							</div>
						</div>	
						<div class="input-group col-sm-12 col-md-12">
							<div class="form-group col-sm-12 col-md-4">    
									Take Home Salary 
							</div> 
							<div class="form-group col-sm-12 col-md-8">    
									<input   class="form-control" type="text" placeholder="0.00" name="takehome" id = "takehome" value= "<?php echo $takehome;?>">  
							</div>
						</div>	
					</div> 	
			</fieldset> 
	</span>
	
	<span  class = "col-md-12 btn-group">
		<button type = "submit" class="btn btn-danger" > Calculate</buttton> 
		<button type = "submit" class="btn btn-success"  > Save Log</buttton> 
		<button   class="btn btn-default"  ><i class = "icon-print"></i> Print</buttton>
	</span>
	
</form>
	
<script> 
	function recalculate(){
	
		
	
	}

	$("form#form_generate").submit(function(e){

		if($('#validate_error').val()==1){
			return false;
		}
			 
				e.preventDefault();
				NProgress.inc();	
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('hrd/regenerate_payroll');?>",
					data: $("#form_generate").serialize(),
					success: function(data)
					{
						 
						$("#contentnya").html(data); 		
						NProgress.done(true);
					}
				});
	});	
</script>