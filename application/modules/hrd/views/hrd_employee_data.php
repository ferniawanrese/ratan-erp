
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th> Full Name </th>
				<th> Address </th>
				<th> Email </th>
				<th> Phone </th>
				<th> Badge </th>		
				<th class = "additionalcolums_name" style="display:none"></th>
				<th> Action </th> 
		  </tr>
	</thead>
	
	<tbody>
			<?php if($employee_data):?>		
			<?php foreach($employee_data as $keys):?>
				<tr>				
					<td><?php echo $keys['employee_name'];?></td>
					<td> <?php echo $keys['employee_address'];?> </td>
					<td class="center"> <?php echo $keys['employee_email'];?> </td>
					<td class="center"> <?php echo $keys['employee_phone'];?> </td>
					<td class="center"> <?php echo $keys['employee_badge'];?> </td>	
					<td class = "additionalcolums_data" style="display:none"></td>
					<!--<td class="additionalcolums1"> <?php echo date("d M Y", strtotime($keys['employee_startworking']));?> </td>		-->				
					<td class="center">
							<div class="btn-toolbar row-action">
								
									<button class="btn btn-info" title="Edit" onclick=edit_employee("<?php echo $keys['employee_hexaID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['employee_hexaID'];?>")><i class="icon-trash "></i></button>
								
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

<div class = "pagination pagination-large col-sm-12 col-md-12"></div>

<?php 	
	$alldata =  $countdata[0]['totdata'];
	$totpage = ceil($alldata/$limit);
?>

<script type='text/javascript'>
			var options = {
				currentPage: <?php echo $page;?>,
				totalPages: <?php echo $totpage;?>,
				alignment:"center",
				useBootstrapTooltip:true,
				tooltipTitles: function (type, page, current) {
					switch (type) {
					case "first":
						return "Go To First Page <i class='icon-fast-backward icon-white '></i>";
					case "prev":
						return "Go To Previous Page <i class=' icon-backward icon-white'></i>";
					case "next":
						return "Go To Next Page <i class=' icon-forward icon-white'></i>";
					case "last":
						return "Go To Last Page <i class=' icon-fast-forward icon-white'></i>";
					case "page":
						return "Go to page " + page + " <i class=' icon-file icon-white'></i>";
					}
				},
				bootstrapTooltipOptions: {
					html: true,
					placement: 'bottom'
				},
				onPageClicked: function changepage(e,originalEvent,type,page){
					$('.progress-bar').show();
					$.ajax({
					type: "POST",
					url: "<?php echo base_url('hrd/hrd_employe_data/');?>" + "/" + page,
					data: $("#form_filter").serialize(),
					
						success: function(data){     
							$( ".list" ).html(data); 							
							$('.progress-bar').hide();
							
						}  
					});
				}

			}

			$('.pagination').bootstrapPaginator(options);
</script>

<script>
function remove_addcolums(a){
$('.'+a).remove();
}
</script>


					
						
		