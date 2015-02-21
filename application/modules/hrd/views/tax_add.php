<form  id = "taxAdd" class="form-horizontal form-validate" enctype="multipart/form-data"   method="post">
						<input name="tax_ID"  id = "tax_ID" class="form-control " type="hidden"  value = "<?php echo $dat[0]['tax_ID'];?>"  /> 	 
 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Tax Name :</label>
							<div class="control col-md-4">
								<input name="tax_name"  id = "tax_name" class="form-control " type="text"  value = "<?php echo $dat[0]['tax_name'];?>"  /> 
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Gross/Netto :</label>
							<div class="control col-md-3">
								<select class = "form-control" name = "grossneto">
									<option value = "gross">Gross</option>
									<option value = "neto">Neto</option>
									<option value = "salary">Salary</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-4 control-label">Tax Persentage  :</label>
							<div class="control col-md-3">
								 <input name="tax_persentage"  id = "tax_persentage" class="form-control   numonly" type="text"  value = "<?php echo $dat[0]['tax_persentage'];?>">
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Taxable Min a Year  :</label>
							<div class="control col-md-3">
								 <input name="taxable_min_year"  id = "taxable_min_year" class="form-control  numonly" type="text"  value = "<?php echo $dat[0]['taxable_min_year'];?>">
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Taxable additional for married a Year :</label>
							<div class="control col-md-3">
								 <input name="taxable_addmarried_year"  id = "taxable_addmarried_year" class="form-control   numonly" type="text"  value = "<?php echo $dat[0]['taxable_addmarried_year'];?>">
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Taxable Min a Month  :</label>
							<div class="control col-md-3">
								 <input name="taxable_min_month"  id = "taxable_min_month" class="form-control  numonly" type="text"  value = "<?php echo $dat[0]['taxable_min_month'];?>">
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Taxable additional for married a month :</label>
							<div class="control col-md-3">
								 <input name="taxable_addmarried_month"  id = "taxable_addmarried_month" class="form-control   numonly" type="text"  value = "<?php echo $dat[0]['taxable_addmarried_month'];?>">
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label">Manual Ammount :</label>
							<div class="control col-md-3">
								 <input name="manual_amount"  id = "manual_amount" class="form-control   numonly" type="text"  value = "<?php echo $dat[0]['manual_amount'];?>">
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-4 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
						</div>
						
</form>


<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">
 

<script>

$(document).ready(function () {
 
  //called when key is pressed in textbox
  $(".numonly").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which != 46 || $(this).val().indexOf('.') != -1) && (e.which < 48 || e.which > 57)) {
        //display error message
       // $("#errmsg").html("Digits Only ").show().fadeOut("slow");
               return false;
    }
   });
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
			 
$("form#taxAdd").submit(function(e){

	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/tax_add_action');?>",
				data: $("#taxAdd").serialize(),
				success: function(data)
				{ 
					NProgress.done(true);
					display_data();
				}
			});
			
			return false;
	});
</script>