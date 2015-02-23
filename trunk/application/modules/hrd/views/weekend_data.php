
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th>  Day </th>  
				<th> Action </th> 
		  </tr>
	</thead> 
	<tbody>
			<?php if($weekend_data):?>		
			<?php foreach($weekend_data as $keys):?>
				<tr>				
					<td> <?php 	echo $keys['weekend_day'];	 ?>  </td>  
				 
					<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?> 
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['weekend_ID'];?>")><i class="icon-trash "></i></button>
								
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