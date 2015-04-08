Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th>  Employee </th>  
				<th>  Total Leaves allowed</th> 
				<th>  Total Leaves Taken</th>   
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
					<?php 	echo $totallowed[0]['totallowed'];?> Days
					</td> 
					<td> 
					<?php 	echo $keys['taken'];	?> Days
					</td> 
					<td> 
					<?php 	echo $totallowed[0]['totallowed'] - $keys['taken'];	?> Days
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