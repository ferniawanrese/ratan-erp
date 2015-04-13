
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border = "1">
	<thead>
		  <tr>   
				
				<th> Department </th> 
				<th> Project </th> 
				<th> Task Name </th>   
				<th> Notes </th>
				<th> Employee </th>
				<th width="110"> Status</th>
				<th>  Register Date </th>
				<th>  Dead Line </th>
				<th>  Date Modified </th>
				 
		  </tr>
	</thead> 
	<tbody>
	 
			<?php if($timesheet_data):?>
			 <?php foreach($timesheet_data as $dat):?>
				<tr>				
					<!--<td>
					<i class ="icon-play" style="cursor:pointer"></i> &nbsp <i class ="icon-pause" style="cursor:pointer"></i> &nbsp <i class ="icon-stop" style="cursor:pointer"></i> &nbsp    <label>01:55</label>
					</td> -->
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
					 <?php foreach($employeelist[$dat['timetracking_ID']] as $key):?>
					 <li><?php echo $key['employee_name'] ;?>, Status: <?php echo $key['status_taskmap'] ;?></li> 
					 <?php endforeach;?>
					 </td>
					 <td> 
					 <?php echo $dat['status_task'] ;?>
					</td>
					<td>
					<?php 
					
					if(($dat['deadline']< date('Y-m-d')) && $dat['status_task'] != "close"){
						$color = "red";
					}else{
						$color = "";
					} 
					?>
					
					<font color = "<?php echo $color;?>"><?php echo date('d M Y', strtotime($dat['register_date']));?> </font>
					</td>
					<td>
					<font color = "<?php echo $color;?>"><?php echo date('d M Y', strtotime($dat['deadline']));?> </font>
					</td>
					<td><?php echo date('d M Y H:i:s' , strtotime($dat['date_modified']));?>
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
