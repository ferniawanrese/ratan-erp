<form  id = "allowanceAdd" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<div class="form-group">
							<label  class="col-sm-4 control-label">Day  :</label>
							<div class="control col-md-2">
								<select class = "form-control" id ="weekend_day" name = "weekend_day">
									<?php  for ($x = 0; $x < 7; $x++) :?>  
									<?php if($weekend_data[0]['weekend_day'] != date('l', strtotime("+$x days", strtotime('2010-03-28')))){?>
									<option value = "<?php echo date('l', strtotime("+$x days", strtotime('2010-03-28')));?>"><?php echo date('l', strtotime("+$x days", strtotime('2010-03-28')));?></option> 
									<?php };?>
									<?php endfor;?>
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



<script>


	$("form#allowanceAdd").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	 
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/weekend_add_action/');?>",
				data: $("#allowanceAdd").serialize(),
				success: function(data)
				{
					
					 display_data();
					
				}
			});
			
			return false;
	});
 
			
</script>