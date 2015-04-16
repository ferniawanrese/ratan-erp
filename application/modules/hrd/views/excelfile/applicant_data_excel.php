
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border="1">
	<thead>
		  <tr>
				<th> Applicant Name </th> 
				<th> Department </th> 
				<th> Job </th> 
				<th> Mobile </th> 
				<th> Email </th> 
				<th> Stage </th>
				<th> Appreciation </th>  
				<th> Expectation Salary </th> 
				<th> Degree </th> 
				<th> Notes </th>  
		  </tr>
	</thead> 
	<tbody>
			<?php if($applicant_data):?>		
			<?php foreach($applicant_data as $keys):?>
				<tr>				
					<td> <?php 	echo $keys['applicant_name'];	 ?>  </td> 
					<td> <?php 	echo $keys['department_name'];	 ?></td> 
					<td> <?php 	echo $keys['job_name'];	 ?></td>  
					<td> <?php 	echo $keys['mobile'];	 ?></td> 
					<td> <?php 	echo $keys['email'];	 ?></td>
					<td> <?php 	echo $keys['stage'];	 ?></td> 					
					<td> <?php 	echo $keys['appreciation'];	 ?></td>  
					 <td> <?php 	echo $keys['expectation_salary'];	 ?></td> 
					 <td> <?php 	echo $keys['degree'];	 ?></td> 
					 <td> <?php 	echo $keys['notes'];	 ?></td>  
				</tr>
			<?php endforeach;?>
			<?php else:?>
				 <tr>
					<td colspan='9'><center>no data</center></td>
				  </tr>
			<?php endif;?>
	</tbody>
	
</table>