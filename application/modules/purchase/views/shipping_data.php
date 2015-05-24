Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th>  Shipping Name </th> 
				<th>  Address </th>   
				<th> Action </th> 
		  </tr>
	</thead> 
	
	<tbody>
		<?php if($shipping_data):?>		
			<?php foreach($shipping_data as $keys):?>	 
				<tr>				
					 
				    <td>
					<?php echo $keys['shipping_name'];?>
					</td> 
					<td>
					<?php echo $keys['address'];?>
					</td>  
					<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?>
									<button class="btn btn-info" title="Edit" onclick=shipping_add("<?php echo $keys['shipping_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['shipping_ID'];?>")><i class="icon-trash "></i></button>								
							</div>
					 </td>
				</tr>
				
			<?php endforeach;?>
		<?php else:?>
			 <tr>
				<td colspan='9'><center>no data</center></td>
			  </tr>
		<?php endif;?>
			 
	</tbody>
	
</table>