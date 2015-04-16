
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border = "1">
	<thead>
		  <tr>
				<th>  Employee </th>  
				<th>  Leave type </th>  
				<th>  Leave</th> 
				<th>  Date Range</th>
				<th>  Note </th>  
				<th> Approval </th> 
		  </tr>
	</thead> 
	<tbody>
			<?php if($leave_data):?>		
			<?php foreach($leave_data as $keys):?>
				<tr>				
					<td> 
					<?php 	echo $keys['employee_name'];?> 
					</td> 
					<td> 
					<?php 	echo $keys['leave_type_name'];	?> 
					</td> 
					<td> 
					<?php 	echo $keys['total_leaves'];	?> Work Days
					</td>
					 <td> 
					<?php 	echo date("d M Y", strtotime($keys['date_start']));	?>  - <?php 	echo date("d M Y", strtotime($keys['date_end']));	?>
					</td>
					<td> 
					<?php 	echo $keys['note'];	?> 
					</td> 
					<td> 
					<?php if($keys['approved']==0):?>
						<font color='red'>No Status</font>
					<?php else:?>
						<?php if($keys['approved']==1){echo "Approved";}else if($keys['approved'] == -1){echo "<font color='red'>Refused</a>";};	?> 
					<?php endif;?>	
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