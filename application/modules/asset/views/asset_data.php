Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th>  Asset Name </th> 
				<th>  Product </th> 
				<th>  Asset Code </th>
				<th>  State </th>
				<th>  Group </th>
				<th>  Department </th> 
				<th>  Location </th>
				<th> Action </th> 
		  </tr>
	</thead> 
	
	<tbody>
		<?php if($asset_data):?>		
			<?php foreach($asset_data as $keys):?>	 
				<tr>				
					<td>
					 <?php echo $keys['asset_name'];?>
					</td> 
					<td>
					<?php echo $keys['product_name'];?>
					</td> 
					<td>					
					<?php echo $keys['asset_code'];?>					  			
					</td> 
					<td>					
					<?php echo $keys['state_name'];?>					  			
					</td> 
					<td>					
					<?php echo $keys['group_name'];?>					  			
					</td> 
					<td>					
					<?php echo $keys['department_ID'];?>					  			
					</td> 
					<td>					
					<?php echo $keys['location'];?>					  			
					</td>
					<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?>
									<button class="btn btn-info" title="Edit" onclick=add_asset("<?php echo $keys['asset_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['asset_ID'];?>")><i class="icon-trash "></i></button>								
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