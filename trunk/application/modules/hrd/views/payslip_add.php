<label class = "pull-right"><font size = "3"><?php echo $dat[0]['employee_name'];?> <?php echo $dat[0]['employee_badge'];?>  </font></label>

	<span class = "col-md-12" >	
		<!-- searching -->
		 <form id = "form_filter" name="form_filter" method="post">
			<fieldset class="default panel">
					<legend> Payslip Period</legend>
					
					 
					<div class="form-group col-sm-12 col-md-3">  
					<label for="validate-text"></label>
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control" type="text" placeholder="Date Start" name="filter[dateStart]" id = "dateStart"> 
						</div> 
					</div>
					  
					<div class="form-group col-sm-12 col-md-3">  
					<label for="validate-text"></label>
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control" type="text" placeholder="Date End" name="filter[dateEnd]" id = "dateEnd"> 
						</div> 
					</div>
					 
					<div class="form-group col-sm-12 col-md-3"> 
						<label for="validate-number"></label>
						<div class="input-group col-sm-12 col-md-12">
							<span class = "btn-group">
								<button type = "submit" class="btn btn-default"  > Generate</buttton>
								<button type = "button" class="btn btn-default" onclick = "clearfilter()" > Clear  </buttton>
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
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							<?php echo $allow['allowance_name'];?>
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
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
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							<?php echo $ded['allowance_name'];?>
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
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
					 
				 
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							Absent Days
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control" type="text" placeholder="0" name="filter[description]" id = "description"> 
						</div> 
					</div>
				  
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							Deduction
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
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
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							<?php echo $tax['tax_name'];?>
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
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
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							Total Allowance
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description"> 
						</div> 
					</div>
				 
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							Total Deduction
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description"> 
						</div> 
					</div>
					
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							Total Tax
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description"> 
						</div> 
					</div>
					
					<div class="form-group col-sm-12 col-md-4">   
						<div class="input-group col-sm-12 col-md-12">
							Take Home Salary
						</div> 
					</div> 
					<div class="form-group col-sm-12 col-md-8">   
						<div class="input-group col-sm-12 col-md-12">
							<input   class="form-control" type="text" placeholder="0.00" name="filter[description]" id = "description"> 
						</div> 
					</div>
					
				</fieldset>
		</form>	
	</span>