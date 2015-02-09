<?php //$this->core->print_rr($datanya);?>
 
<tr id = "<?php echo $id;?>">
	<td>
	<span id = "product_name<?php echo $id;?>" ><?php echo $datanya['product'];?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>product_ID" name = "expends_detail[<?php echo $id;?>][product_ID]" value = "<?php echo $datanya['product_ID'];?>">
	</td>
	<td> 
	<span id = "expense_note<?php echo $id;?>"><?php echo $datanya['expense_note'];?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>expense_note" name = "expends_detail[<?php echo $id;?>][expense_note]" value = "<?php echo $datanya['expense_note'];?>">
	</td>
	<td> 
	<span id = "reference<?php echo $id;?>"><?php echo $datanya['reference'];?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>reference" name = "expends_detail[<?php echo $id;?>][reference]" value = "<?php echo $datanya['reference'];?>">
	</td>
	<td style="text-align:right">
	<span id = "unit_price<?php echo $id;?>"><?php echo $datanya['unit_price'] * 1;?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>unit_price" name = "expends_detail[<?php echo $id;?>][unit_price]" value = "<?php echo $datanya['unit_price'];?>">
	</td>
	<td style="text-align:right">
	<span id = "quantity<?php echo $id;?>"><?php echo $datanya['quantity'] * 1;?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>quantity" name = "expends_detail[<?php echo $id;?>][quantity]" value = "<?php echo $datanya['quantity'];?>">
	</td>
	<td>
	<span id = "UoM<?php echo $id;?>"><?php echo $datanya['UoM'];?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>UoM" name = "expends_detail[<?php echo $id;?>][UoM]" value = "<?php echo $datanya['UoM'];?>">
	</td>
	<td style="text-align:right">
	<span id = "sub_total<?php echo $id;?>"><?php echo $datanya['unit_price'] * $datanya['quantity'] * 1;?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>sub_total" name = "expends_detail[<?php echo $id;?>][sub_total]" value = "<?php echo $datanya['unit_price'] * $datanya['quantity'];?>">
	</td> 
	<td class="center">
			<div class="btn-toolbar row-action">  
					<button class="btn btn-info" title="Edit" onclick="add_detailx('<?php echo $id;?>')" type="button" data-target="#myModal" data-toggle="modal"><i class="icon-edit"></i></button>
					<button class="delete btn btn-danger" title="Delete" onclick=delete_draft("<?php echo $id;?>")><i class="icon-trash "></i></button> 
			</div>
	 </td>
</tr>
 
<script>
 function add_detailx(a){
  
				var product_name = $('#product_name'+a).text();
				 
				var product_ID = $('#expends_detail'+a+'product_ID').val();
				
				var expense_note = $('#expends_detail'+a+'expense_note').val();
				
				var reference = $('#expends_detail'+a+'reference').val();
				
				var unit_price = $('#expends_detail'+a+'unit_price').val();
				
				var sub_total = $('#expends_detail'+a+'sub_total').val();
				
				var UoM = $('#expends_detail'+a+'UoM').val();
				
				$('#draft_stat').val(a);
				
				$('#expense_detaiID').val('');
				
				$('#product').val(product_name);
				
				$('#product_ID').val(product_ID);
				
				$('#expense_note').val(expense_note);
				
				$('#reference').val(reference);
				
				$('#unit_price').val(unit_price);
				
				$('#sub_total').val(sub_total);
				
				$('#UoM').val(UoM);
				   
 }
 </script>