<form  id = "form-expendsdetail" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
				 	
	<div class="form-group">
		<label  class="col-sm-3 control-label">Product :</label>
		<div class="control col-md-6">
			<input name="product"  id = "product" class="form-control product" type="text"    /> 
			<input id = "product_ID" name="product_ID"  class = "product_ID" type="hidden"  />
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Expense Note:</label>
		<div class="control col-md-6">
			<input id = "expense_note" name="expense_note" class="form-control expense_note" type="text" value = ""/>
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Unit Price :</label>
		<div class="control col-md-4">
			<input name="unit_price"  id = "unit_price" class="form-control " type="text" /> 
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Quantity :</label>
		<div class="control col-md-4">
			<input name="quantity"  id = "quantity" class="form-control numonly" type="text" /> 
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">UoM :</label>
		<div class="control col-md-4">
			<span class = "input-group  "> 
			<select class = "form-control" id = "UoM" name = "UoM">
			<?php foreach($uom as $uom):?>
			<option><?php echo $uom['uom_name'];?></option>
			<?php endforeach;?>
			</select>
			<span class="input-group-addon ">
				<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
			</span>
			</span>
		</div>
	</div> 
	<div class="form-group">
		<label  class="col-sm-3 control-label">Reference:</label>
		<div class="control col-md-6">
			<input id = "reference" name="reference" class="form-control" type="text" value = ""/> 
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

$(function() {
		$( ".product" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_product_name/');?>" + "/" + $('.product').val(),
				select: function (event, ui) {
				var id = ui.item.product_ID; 
				$(".product_ID").val(id); 
				}  
				
		}); 
}); 

$("form#form-expendsdetail").submit(function(e){
	
	//e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/expends_detail_add_action');?>",
				data: $("#form-expendsdetail").serialize(),
				success: function(data)
				{
					$('#myModal').modal('hide');
					$( "#draft" ).append(data); 	
					NProgress.done(true);
				}
			});
			
			return false;
	});

</script>