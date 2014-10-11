 

<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>   
				
				<th> Name </th> 
				<th> Status </th> 
				 
		  </tr>
	</thead> 
	<tbody>
	<?php if($employee):?>
			<?php foreach($employee as $em):?>		 
				<tr>				
					
					<td>
						<?php echo $em['employee_name'];?>
					</td> 
					
					<td>
						 <?php echo form_dropdown('status', $status,  $em['status_taskmap'],'class = "form-control" id = "status'.$em['timetrackingmapID'].'"');  ?>  
					</td>
					
				</tr>	
				
				<script>
									
					$( "select#status<?php echo $em['timetrackingmapID'];?>" ).change(function() {
						
							var a = $('select#status<?php echo $em['timetrackingmapID'];?> option:selected').val();
							
							var timetrackingmapID = "<?php echo $em['timetrackingmapID'];?>";
							  
							$.ajax({
								
								url: "<?php echo base_url('hrd/update_taskstatusmap/');?>" + '/' + timetrackingmapID + '/' + a,
								 
								success: function (data) {
								  
								}
							});
							
						});
				</script>
				
			<?php endforeach;?>
	<?php else:?>
				<tr>				
					
					<td colspan="2">
						No data
					</td> 
				
				</tr>
	<?php endif;?>			
	</tbody>
	
</table>