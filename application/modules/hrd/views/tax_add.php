<form  id = "allowanceAdd" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<input name="tax_ID"  id = "tax_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['tax_ID'];?>"  /> 	 
 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Allowance Name :</label>
							<div class="control col-md-4">
								<input name="allowance_name"  id = "allowance_name" class="form-control {validate:{required:true}}" type="text"  value = "<?php echo $dat[0]['tax_ID'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Description :</label>
							<div class="control col-md-4">
								<textarea  id = "allowance_desc" name = "allowance_desc"class="form-control "><?php echo $dat[0]['tax_ID'];?></textarea> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Deducation  :</label>
							<div class="control col-md-2">
								<select class = "form-control" id ="deduction_stat" name = "deduction_stat">
									<option value = "0">No</option>
									<option value = "1">Yes</option>
								</select>
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
						</div>
						
</form>