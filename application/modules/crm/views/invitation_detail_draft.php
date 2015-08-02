<?php if($draft_stat==""):?>
<tr id = "<?php echo $id;?>">
<?php endif;?> 
	<td>  
	<span id = "to_name<?php echo $id;?>" ><?php echo $datanya['to_name'];?></span>
	<input type = "hidden" id = "invitation_detail<?php echo $id;?>to_ID" name = "invitation_detail[<?php echo $id;?>][to_ID]" value = "<?php echo $datanya['to_ID'];?>">
	</td>
	 
	 <td> 
	<span id = "role<?php echo $id;?>"><?php echo $datanya['role'];?></span>
	<input type = "hidden" id = "invitation_detail<?php  echo $id;?>role" name = "invitation_detail[<?php echo $id;?>][role]" value = "<?php echo $datanya['role'];?>">
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
 