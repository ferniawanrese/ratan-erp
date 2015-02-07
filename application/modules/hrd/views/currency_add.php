<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<input name="currency_ID"  id = "currency_ID" class="form-control " type="hidden"  value = "<?php echo $currency_add[0]['currency_ID'];?>"  /> 	 
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Currency Name:</label>
							<div class="control col-md-4">
								<input name="currency_name"  id = "currency_name" class="form-control " type="text"  value = "<?php echo $currency_add[0]['currency_name'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Currency Code:</label>
							<div class="control col-md-4">
								<input name="currency_code"  id = "currency_code" class="form-control " type="text"  value = "<?php echo $currency_add[0]['currency_code'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Symbol:</label>
							<div class="control col-md-4">
								<input name="currency_symbol"  id = "currency_symbol" class="form-control " type="text"  value = "<?php echo $currency_add[0]['currency_symbol'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Format Separator:</label>
							<div class="control col-md-4">
								<input name="currency_format_separator"  id = "currency_format_separator" class="form-control " type="text"  value = "<?php echo $currency_add[0]['currency_format_separator'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Format Decimal:</label>
							<div class="control col-md-4">
								<input name="currency_format_decimal"  id = "currency_format_decimal" class="form-control " type="text"  value = "<?php echo $currency_add[0]['currency_format_decimal'];?>"  /> 
							</div>
						</div>
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Exchange Rate:</label>
							<div class="control col-md-4">
								<input name="exchange_rate"  id = "exchange_rate" class="form-control " type="text"  value = "<?php echo $currency_add[0]['exchange_rate'];?>"  /> 
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
	 
	$("form#catAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/currency_add_action/');?>",
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
 