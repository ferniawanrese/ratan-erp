<?php //$this->core->print_rr($datanya);?>
<tr id = "<?php echo $id;?>">
	<td>
	<?php echo $datanya['product'];?>
	<input type = "hidden" id = "expends_detail[<?php echo $id;?>][product_ID]" name = "expends_detail[<?php echo $id;?>][product_ID]" value = "<?php echo $datanya['product_ID'];?>">
	</td>
	<td> 
	<?php echo $datanya['expense_note'];?>
	<input type = "hidden" id = "expends_detail[<?php echo $id;?>][expense_note]" name = "expends_detail[<?php echo $id;?>][expense_note]" value = "<?php echo $datanya['expense_note'];?>">
	</td>
	<td> 
	<?php echo $datanya['reference'];?>
	<input type = "hidden" id = "expends_detail[<?php echo $id;?>][reference]" name = "expends_detail[<?php echo $id;?>][reference]" value = "<?php echo $datanya['reference'];?>">
	</td>
	<td>
	<?php echo $datanya['unit_price'];?>
	<input type = "hidden" id = "expends_detail[<?php echo $id;?>][unit_price]" name = "expends_detail[<?php echo $id;?>][unit_price]" value = "<?php echo $datanya['unit_price'];?>">
	</td>
	<td>
	<?php echo $datanya['quantity'];?>
	<input type = "hidden" id = "expends_detail[<?php echo $id;?>][quantity]" name = "expends_detail[<?php echo $id;?>][quantity]" value = "<?php echo $datanya['quantity'];?>">
	</td>
	<td>
	<?php echo $datanya['UoM'];?>
	<input type = "hidden" id = "expends_detail[<?php echo $id;?>][UoM]" name = "expends_detail[<?php echo $id;?>][UoM]" value = "<?php echo $datanya['UoM'];?>">
	</td>
	<td>
	<?php echo $datanya['unit_price'] * $datanya['quantity'];?>
	<input type = "hidden" id = "expends_detail[<?php echo $id;?>][sub_total]" name = "expends_detail[<?php echo $id;?>][sub_total]" value = "<?php echo $datanya['unit_price'] * $datanya['quantity'];?>">
	</td> 
	<td class="center">
			<div class="btn-toolbar row-action"> 
					<button class="btn btn-info" title="Edit" onclick=update_department("<?php echo $id;?>")><i class="icon-edit"></i></button>
					<button class="delete btn btn-danger" title="Delete" onclick=delete_draft("<?php echo $id;?>")><i class="icon-trash "></i></button> 
			</div>
	 </td>
</tr> 
 