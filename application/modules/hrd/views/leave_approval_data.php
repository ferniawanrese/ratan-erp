
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th>  Employee </th>  
				<th>  Leave type </th>  
				<th>  Note </th>  
				<th> Approval </th>
				<th> Action </th> 
		  </tr>
	</thead> 
	<tbody>
			<?php if($leave_data):?>		
			<?php foreach($leave_data as $keys):?>
				<tr>				
					<td> 
					<?php 	echo $keys['employee_name'];?> 
					</td> 
					<td> 
					<?php 	echo $keys['leave_type_name'];	?> 
					</td> 
					<td> 
					<?php 	echo $keys['note'];	?> 
					</td> 
					<td> 
					<?php if($keys['approved']==0):?>
						<div class="btn-toolbar row-action">   
									<?php if($keys['approved']==0 ):?>
									 <a href = "#" onclick = "approved('1','<?php echo $keys['leave_ID'];?>')"><i class="icon-ok-sign"></i> Approve </a>
									 <a href = "#" onclick = "approved('-1','<?php echo $keys['leave_ID'];?>')"><i class="icon-remove-sign"></i> Refuse</a>
									 <?php endif;?>
						</div>
					<?php else:?>
						<?php if($keys['approved']==1){echo "Approved";}else if($keys['approved'] == -1){echo "Refused";};	?> 
					<?php endif;?>	
					</td> 
				 
					<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?>
									<button class="btn btn-info" title="Edit" onclick=leave_add("<?php echo $keys['leave_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['leave_ID'];?>")><i class="icon-trash "></i></button>
								
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
<?php if($leave_data):?>	
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
					url: "<?php echo base_url('hrd/leave_approval_data/');?>" + "/" + page,
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