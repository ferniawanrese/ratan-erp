Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border = "1">
	<thead>
		  <tr>
				<th>  Employee </th>  
				<th>  Leave type</th> 
				<th>  Leaves allowed</th> 
				<th>  Leaves Taken</th>   
				<th>  Leaves Available</th> 
				 
		  </tr>
	</thead> 
	
	<tbody>
			<?php if($leave_data):?>		
			<?php foreach($leave_data as $keys):?>
				<tr>				
					<td> 
					<?php 	echo $keys['employee_name'];	?>
					</td> 
					<td>  
					<?php 	echo $keys['leave_type_name'];?> 
					</td> 
					<td> 
					<?php 	echo $keys['limit_days'];?> Days
					</td> 
					<td> 
					<?php 	echo $keys['taken'];	?> Days
					</td>
					<td> 
					<?php 	echo $keys['limit_days'] - $keys['taken'];	?> Days
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