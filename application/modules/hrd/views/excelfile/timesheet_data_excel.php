
Attendance : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border = "1">
	<thead>
		  <tr>  
				<th> Department </th> 
				<th> Project </th> 
				<th> Task Name </th>   
				<th> Notes </th> 
				<th> Status </th>
				<th>  Dead Line </th> 
				<th>  Last Modified </th> 
		  </tr>
	</thead> 
	<tbody>
	 <?php //$this->core->print_rr($timesheet_data);?>
			<?php if($timesheet_data):?>
			 <?php foreach($timesheet_data as $dat):?>
				<tr>			
					<td>
					 <?php 
					if($dat['department_parentID']=='0'){
						echo $dat['department_name'];
					}else{ 
						echo $depparent[$dat['department_parentID']].'/'.$dat['department_name'];
					}					 
					?> 	
					</td>
					<td>
					<?php echo $dat['project_name'];?>	 
					</td>
					<td>
					<?php echo $dat['task_name'];?>	 
					</td> 
					<td>
					<?php echo $dat['description'];?>	 
					</td> 
					 <td> 
					 <?php echo  $dat['status_taskmap'];?>
					</td>
					<td>
					<?php echo date('d M Y h:i:s',strtotime($dat['deadline']));?>	 
					</td> 
					 <td>
					<?php echo date('d M Y h:i:s',strtotime($dat['date_modified']));?>	 
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