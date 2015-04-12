
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border='1'>
	<thead>
		  <tr>
				<th> Full Name </th>
				<th> Address </th>
				<th> Email </th>
				<th> Mobile Phone </th>
				<th> Badge </th> 
		  </tr>
	</thead>
	
	<tbody>
			<?php if($employee_data):?>		
			<?php foreach($employee_data as $keys):?>
				<tr>				
					<td><?php echo $keys['employee_name'];?></td>
					<td> <?php echo $keys['employee_address'];?> </td>
					<td class="center"> <?php echo $keys['employee_email'];?> </td>
					<td class="center"> <?php echo $keys['employee_mobilephone'];?> </td>
					<td class="center"> <?php echo $keys['employee_badge'];?> </td>	
					 
				</tr>
			<?php endforeach;?>
			<?php else:?>
				 <tr>
					<td colspan='9'><center>no data</center></td>
				  </tr>
			<?php endif;?>
	</tbody>
	
</table>