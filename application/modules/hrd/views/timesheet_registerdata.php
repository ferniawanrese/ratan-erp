
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>   
				<th> Project </th> 
				<th> Task Name </th>  
				<th> Notes </th>  
				<th> Spend Time </th>
				<th> Status </th>
				<th>  Dead Line </th>
				<th> Action </th> 
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
					<?php echo $dat['project_name'];?>		
					</td> 
					<td>
					<?php echo $dat['task_name'];?>		
					</td>  
					<td>
					<?php echo $dat['description'];?>		
					</td> 
					 
					 <td>
					1 Days 5 Hours
					</td>
					 <td>
					Active	
					</td>
					<td>
					<?php echo date('d M Y h:i', strtotime($dat['register_date']));?> AM
					</td>
					<td class="center">
							<div class="btn-toolbar row-action"> 
									<button class="btn btn-default" title="Edit" onclick=timesheet_position_update("<?php echo $dat['timetracking_ID'];?>")><i class="icon-pause"></i></button>
									<button class="delete btn btn-default" title="Delete" onclick=delete_post("<?php echo $dat['timetracking_ID'];?>")><i class="icon-stop "></i></button>
									<button class="btn btn-info" title="Edit" onclick=update_timesheet("<?php echo $dat['timetracking_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $dat['timetracking_ID'];?>")><i class="icon-trash "></i></button>									
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
					url: "<?php echo base_url('hrd/timesheet_registerdata/');?>" + "/" + page,
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


					
						
		