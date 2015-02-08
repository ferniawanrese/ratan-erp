
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th>  Leave Type </th>  
				<th>  Description </th>  
				<th>  Limit Days </th>  
				<th> Payroll Deduction </th>
				<th> Action </th> 
		  </tr>
	</thead> 
	<tbody>
			<?php if($leave_type_data):?>		
			<?php foreach($leave_type_data as $keys):?>
				<tr>				
					<td> 
					<?php 	echo $keys['leave_type_name'];?> 
					</td> 
					<td> 
					<?php 	echo $keys['description'];	?> 
					</td> 
					<td> 
					<?php 	echo $keys['limit_days'];	?> 
					</td> 
					<td> 
					<?php if($keys['payroll_deduction']==0){echo "No";}else{echo "Yes";};	?> 
					</td> 
				 
					<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?>
									<button class="btn btn-info" title="Edit" onclick=leave_type_update("<?php echo $keys['leave_typeID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['leave_typeID'];?>")><i class="icon-trash "></i></button>
								
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
<?php if($leave_type_data):?>	
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
					url: "<?php echo base_url('hrd/leave_type_data/');?>" + "/" + page,
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