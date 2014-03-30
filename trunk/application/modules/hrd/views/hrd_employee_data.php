<table class="table table-striped table-bordered table-responsive">
	<thead>
		  <tr>
				<th> No </th>
				<th> Full Name </th>
				<th> Address </th>
				<th> Email </th>
				<th> Phone </th>
				<th> Start Working </th>				
				<th> Action </th>
				
				
		  </tr>
	</thead>
	
	<tbody>
			<?php if($employee_data):?>		
			<?php $i=1;foreach($employee_data as $keys):?>
				<tr>
					<td><a href="#"><?php echo $i;?></a></td>
					<td><a href="#"><?php echo $keys['employee_name'];?></a></td>
					<td> <?php echo $keys['employee_address'];?> </td>
					<td class="center"> <?php echo $keys['employee_email'];?> </td>
					<td class="center"> <?php echo $keys['employee_phone'];?> </td>
					<td class="center"> <?php echo date("d M Y", strtotime($keys['employee_startworking']));?> </td>					
				
					<td class="center">
							<div class="btn-toolbar row-action">
								<div class="btn-group">
									<button class="btn btn-info" title="Edit" onclick=edit_employee("<?php echo $keys['employee_hexaID'];?>")><i class="icon-edit"></i></button>
									<button class="btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['employee_hexaID'];?>")><i class="icon-remove"></i></button>
									<button class="btn btn-inverse" title="Suspend"><i class=" icon-remove-sign"></i></button>
									<button class="btn btn-success" title="Approve"><i class=" icon-ok"></i></button>
								</div>
							</div>
					 </td>
				</tr>
			<?php $i++;endforeach;?>
			<?php else:?>
				 <tr>
					<td colspan='9'><center>no data</center></td>
				  </tr>
	<?php endif;?>
	</tbody>
				                
</table>

<script>
function delete_post(a){

	$.ajax({
				url: "<?php echo base_url('hrd/hrd_delete_employee/')?>/" + a,
		        
				success: function(data)
			    {
						$('.bar').hide();
						display_data();
			    }

	});
}

function edit_employee(a){

	$('.bar').show();

	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>/" + a,
				success: function(data){     

					$( ".list" ).html(data); 
					$('.bar').hide();
				}  
			});

}
</script>