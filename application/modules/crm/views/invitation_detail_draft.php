<?php if($draft_stat==""):?>
<tr id = "<?php echo $id;?>">
<?php endif;?>
 
	<td>  
	<span id = "product_name<?php echo $id;?>" ><?php echo $datanya['product'];?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>product_ID" name = "expends_detail[<?php echo $id;?>][product_ID]" value = "<?php echo $datanya['product_ID'];?>">
	</td>
	<td> 
	<span id = "expense_note<?php echo $id;?>"><?php echo $datanya['expense_note'];?></span>
	<input type = "hidden" id = "expends_detail<?php echo $id;?>expense_note" name = "expends_detail[<?php echo $id;?>][expense_note]" value = "<?php echo $datanya['expense_note'];?>">
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
<?php if($draft_stat==""):?>  
</tr> 
<?php endif;?>
 