
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border="1">
	<thead>
		  <tr>
				<th> Job Name </th> 
				<th> Department </th> 
				<th> Job Description</th>  
				<th> Employee Filled </th>
				<th> Expectation Requirement </th>  
				<!--<th> Action </th> -->
		  </tr>
	</thead> 
	<tbody>
			<?php if($jobspace_data):?>		
			<?php foreach($jobspace_data as $keys):?>
				<tr>				
					<td> <?php 	echo $keys['job_name'];	 ?>  </td> 
					<td> <?php 	echo $keys['department_name'];	 ?></td> 
					<td> <?php 	echo $keys['job_desc'];	 ?></td>  
					<td> 
					<?php if($keys['employee_num']<$keys['job_expected_requirement']):?>
					<font color="red"><?php 	echo $keys['employee_num'];	 ?></font>
					<?php else:?>
					<?php 	echo $keys['employee_num'];	 ?>
					<?php endif;?>
					
					</td> 
					<td> <?php 	echo $keys['job_expected_requirement'];	 ?></td>
				 
					<!--<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?>
									<button class="btn btn-info" title="Edit" onclick=applicant_update("<?php echo $keys['job_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['job_ID'];?>")><i class="icon-trash "></i></button>
								
							</div>
					 </td>-->
				</tr>
			<?php endforeach;?>
			<?php else:?>
				 <tr>
					<td colspan='9'><center>no data</center></td>
				  </tr>
			<?php endif;?>
	</tbody>
	
</table>