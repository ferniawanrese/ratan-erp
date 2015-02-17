<form  id = "form-expendsdetail" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
	
	<input name="expense_detaiID"  id = "expense_detaiID"   type="hidden" value = "<?php echo $expends_detail[0]['expense_detaiID'];?>"   />
	
	<input name="draft_stat"  id = "draft_stat"   type="hidden" value = "" />
	<div class="form-group">
		<label  class="col-sm-3 control-label">Barcode :</label>
		<div class="control col-md-6">
			 
			<input name="product_code"  id = "product_code" class="form-control product_code {validate:{required:true}}" type="text"   value = "<?php echo $expends_detail[0]['product_name'];?>"  /> 
			 
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Product :</label>
		<div class="control col-md-6">
			<span class = "input-group  "> 
			<input name="product"  id = "product" class="form-control product {validate:{required:true}}" type="text"   value = "<?php echo $expends_detail[0]['product_name'];?>"  /> 
			<input id = "product_ID" name="product_ID"  class = "product_ID" type="hidden" value = "<?php echo $expends_detail[0]['product_ID'];?>" />
			
			<span class="input-group-addon ">
				<i class="icon-plus " style="cursor:pointer;" title="Add Product" onclick="add_product()"></i>
			</span>
			</span>
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Expense Note:</label>
		<div class="control col-md-6">
			<input id = "expense_note" name="expense_note" class="form-control expense_note" type="text" value = "<?php echo $expends_detail[0]['expense_note'];?>"/>
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Unit Price :</label>
		<div class="control col-md-4">
			<input name="unit_price"  id = "unit_price" class="form-control numonly {validate:{required:true}}" type="text" value = "<?php echo $expends_detail[0]['unit_price'] * 1;?>"/> 
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">Quantity :</label>
		<div class="control col-md-4">
			<input name="quantity"  id = "quantity" class="form-control numonly {validate:{required:true}}" type="text" value = "<?php echo $expends_detail[0]['quantity'] * 1;?>" /> 
		</div>
	</div>
	<div class="form-group">
		<label  class="col-sm-3 control-label">UoM :</label>
		<div class="control col-md-4">
			<span class = "input-group  "> 
			<select class = "form-control" id = "UoM" name = "UoM">
			<?php foreach($uom as $uom):?>
				<?php if($uom['uom_name'] == $expends_detail[0]['uom']){$selected = 'selected="selected"';}else{$selected = "";};?>
				<option value = "<?php echo $uom['uom_name'];?>" <?php echo $selected;?>><?php echo $uom['uom_name'];?></option>
			<?php endforeach;?>
			</select>
			
			<span class="input-group-addon ">
				<i class="icon-plus " style="cursor:pointer;" title="Add UoM"  onclick="add_uom()"></i>
			</span>
			
			</span>
		</div>
	</div> 
	<div class="form-group">
		<label  class="col-sm-3 control-label">Reference:</label>
		<div class="control col-md-6">
			<input id = "reference" name="reference" class="form-control" type="text" value = "<?php echo $expends_detail[0]['reference'];?>"/> 
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

document.getElementById('product_code').focus();
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
				var barcode = ui.item.barcode; 
				$(".product_ID").val(id); 
				$(".product_code").val(barcode); 
				}  
				
		}); 
}); 

$("form#form-expendsdetail").submit(function(e){
	// add detail
	
			var draft_stat = $('#draft_stat').val();
			 
			if($('#expense_detaiID').val()==""){
				NProgress.inc();	
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('hrd/expends_detail_add_action');?>"+"/"+draft_stat,
					data: $("#form-expendsdetail").serialize(),
					success: function(data)
					{
						$('#myModal').modal('hide');
						 
						if(draft_stat == ""){
							$( "#draft" ).append(data); 	
						}else{
							
							$( "#"+draft_stat ).html(data); 	
							
						} 
						NProgress.done(true);
					}
				}); 
			}
			 
			else{
				 
				var productnya = $('#product').val();
			
				var product_IDnya = $('#product_ID').val();
				
				var expense_notenya = $('#expense_note').val(); 
				
				var unit_pricenya = $('#unit_price').val(); 
				
				var quantitynya = $('#quantity').val(); 
				
				var UoMnya = $('#UoM').val();
				
				var referencenya = $('#reference').val();
				
				var sub_total = quantitynya * unit_pricenya;
				
				//------------html
				 
				$('#product_name<?php echo $expends_detail[0]['expense_detaiID'];?>').html(productnya);
				
				$('#product_ID<?php echo $expends_detail[0]['expense_detaiID'];?>').html(product_IDnya);
				
				$('#unit_price<?php echo $expends_detail[0]['expense_detaiID'];?>').html(unit_pricenya);
				
				$('#expense_note<?php echo $expends_detail[0]['expense_detaiID'];?>').html(expense_notenya);
				
				$('#quantity<?php echo $expends_detail[0]['expense_detaiID'];?>').html(quantitynya);
				
				$('#UoM<?php echo $expends_detail[0]['expense_detaiID'];?>').html(UoMnya);
				
				$('#reference<?php echo $expends_detail[0]['expense_detaiID'];?>').html(referencenya);
				
				$('#sub_total<?php echo $expends_detail[0]['expense_detaiID'];?>').html(sub_total);
				 
				//------------ val
				
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>product_name').val(productnya);
				
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>product_ID').val(product_IDnya);
				
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>unit_price').val(unit_pricenya);
				
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>expense_note').val(expense_notenya);
				
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>quantity').val(quantitynya);
				
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>UoM').val(UoMnya);
				
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>reference').val(referencenya);
				 
				$('#expends_detail<?php echo $expends_detail[0]['expense_detaiID'];?>sub_total').val(sub_total);
				
				$('#myModal').modal('hide');
			}

			
			return false;
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
	
	function add_uom(){	
	 
	 $.ajax({
				 url: "<?php echo base_url('hrd/uom_add/');?>",
				success: function(data){      
				
				$( "#modal_body" ).html(data); 		 
				$( "#modal_label" ).html("Add UoM"); 	
				}  
		 
		 }) 
	 }
	 
	 
	function add_product(){	
	 
	 $.ajax({
				 url: "<?php echo base_url('hrd/product_add/');?>",
				success: function(data){      
				
				$( "#modal_body" ).html(data); 		 
				$( "#modal_label" ).html("Add Product"); 	
				}  
		 
		 }) 
	 }
	 
	$("#product_code").focusout(function() {
	
		var barcode = $("#product_code").val();
		$.ajax({
				 url: "<?php echo base_url('hrd/barcode_check/');?>"+"/"+barcode,
				success: function(data){  

					var jsonData = JSON.parse(data);  
					$.each(jsonData.barcode_check, function(i, v) {

							var datanya = jsonData.barcode_check[i]; 
							$('#product').val(datanya.product_name);
							$('#product_ID').val(datanya.product_ID);
                    });
				  	
				}  
		 
		 }) 
	 }) 

</script>