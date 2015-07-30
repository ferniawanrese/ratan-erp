Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th>  Customer Name </th> 
				<th>  Description </th>
				<th>  Contact Person </th>   
				<th>  Email </th> 
				<th>  Fax </th> 
				<th>  Phone </th> 
				<th>  Address </th> 
				<th> Action </th> 
		  </tr>
	</thead> 
	
	<tbody>
		<?php if($crm_data):?>		
			<?php foreach($crm_data as $keys):?>	 
				<tr>				
					<td>
					 <?php echo $keys['partner_name'];?>
					</td> 
					<td>
					<?php echo $keys['description'];?>
					</td> 
					<td>					
					<?php echo $keys['contact_person'];?>					  			
					</td> 
					<td>					
					<?php echo $keys['email'];?>					  			
					</td> 
					<td>					
					<?php echo $keys['fax'];?>					  			
					</td> 
					 
					<td>					
					<?php echo $keys['phone'];?> 		
					</td> 
					<td>					
					<?php echo $keys['address'];?>					  			
					</td>
					<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?>
									<button class="btn btn-info" title="Edit" onclick=add_crm("<?php echo $keys['partner_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['partner_ID'];?>")><i class="icon-trash "></i></button>								
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