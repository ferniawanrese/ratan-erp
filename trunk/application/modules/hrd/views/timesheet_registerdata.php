
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
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
					 <button class="btn btn-default" title="Edit" onclick="list_employee('<?php echo $dat['timetracking_ID'];?>')" data-target="#myModal" data-toggle="modal"><i class="icon-group"></i> list</button>
					 </td>
					 <td> 
					 <?php echo form_dropdown('status', $status,  $dat['status_task'],'class = "form-control" id="status'.$dat['timetracking_ID'].'"') ;?>
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
					<td class="center">
							<div class="btn-toolbar row-action">  
									<button class="btn btn-info" title="Edit" onclick=update_timesheet("<?php echo $dat['timetracking_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $dat['timetracking_ID'];?>")><i class="icon-trash "></i></button>									
							</div>
					 </td>
				</tr>
				
				<script>
				 
					$( "select#status<?php echo $dat['timetracking_ID'];?>" ).change(function() {
						
							var a = $('select#status<?php echo $dat['timetracking_ID'];?> option:selected').val();
							
							var timetracking_ID = "<?php echo $dat['timetracking_ID'];?>";
							  
							bootbox.confirm("This action will change employee task status who listed in this task, are you sure ?", function (result) {
								  
									if(result == true){						
										$.ajax({
								
											url: "<?php echo base_url('hrd/update_taskstatus/');?>" + '/' + timetracking_ID + '/' + a,
											 
											success: function (data) {
											  
											}
										});
									}else{
										display_data();
									}
							});
						});
				</script>
			<?php endforeach;?>
			<?php else:?>
				 <tr>
					<td colspan='9'><center>no data</center></td>
				  </tr>
			<?php endif;?>
	</tbody>
	
</table>

<div class = "pagination pagination-large col-sm-12 col-md-12"></div>
<?php if($timesheet_data):?>

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
					NProgress.inc();
					$.ajax({
					type: "POST",
					url: "<?php echo base_url('hrd/timesheet_registerdata/');?>" + "/" + page,
					data: $("#form_filter").serialize(),
					
						success: function(data){     
							$( ".list" ).html(data); 							
							NProgress.done(true);
							
						}  
					});
				}

			}

			$('.pagination').bootstrapPaginator(options);
</script>
 <?php endif;?>
 
<script>
function remove_addcolums(a){
$('.'+a).remove();
}

function delete_post(a){
					
					bootbox.confirm("Are you sure you want to delete this?", function (result) {
								  
									if(result == true){						
										$.ajax({
													url: "<?php echo base_url('hrd/timesheet_deleted/')?>/" + a,									
													success: function(data)
													{											
															display_data();
													}
										});
									}
									
								});
				}
</script>



					
						
		