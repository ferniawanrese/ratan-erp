 
<tr id = "<?php echo $id;?>">
	<td>
	<?php echo $datanya['date_allow'];?>
	<input type = "hidden" id = "date_detail[<?php echo $id;?>][date_allow]" name = "date_detail[<?php echo $id;?>][date_allow]" value = "<?php echo $datanya['date_allow'];?>">
	</td>
	<td> 
	<?php echo $datanya['note'];?>
	<input type = "hidden" id = "date_detail[<?php echo $id;?>][note]" name = "date_detail[<?php echo $id;?>][note]" value = "<?php echo $datanya['note'];?>">
	</td> 
	<td class="center">
			<div class="btn-toolbar row-action">  
					<button class="btn btn-info" title="Edit" onclick="update_date_allow('<?php echo $id;?>')" type="button" data-target="#myModal" data-toggle="modal"><i class="icon-edit"></i></button>
					<button class="delete btn btn-danger" title="Delete" onclick=delete_draft("<?php echo $id;?>")><i class="icon-trash "></i></button> 
			</div>
	 </td>
</tr> 

