
Total Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>
				<th> Applicant Name </th> 
				<th> Department </th> 
				<th> Job </th> 
				<th> Mobile </th> 
				<th> Email </th> 
				<th> Stage </th>
				<th> Appreciation </th>
				<th> Action </th> 
		  </tr>
	</thead> 
	<tbody>
			<?php if($applicant_data):?>		
			<?php foreach($applicant_data as $keys):?>
				<tr>				
					<td> <?php 	echo $keys['applicant_name'];	 ?>  </td> 
					<td> <?php 	echo $keys['department_name'];	 ?></td> 
					<td> <?php 	echo $keys['job_name'];	 ?></td>  
					<td> <?php 	echo $keys['mobile'];	 ?></td> 
					<td> <?php 	echo $keys['email'];	 ?></td>
					<td> <?php 	echo $keys['stage'];	 ?></td> 					
					<td> <?php 	echo $keys['appreciation'];	 ?></td> 
					<td class="center">
							<div class="btn-toolbar row-action">
									<?php //echo $keys['employee_catParentID'];?>
									<button class="btn btn-info" title="Edit" onclick=applicant_update("<?php echo $keys['applicant_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $keys['applicant_ID'];?>")><i class="icon-trash "></i></button>
								
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
<?php if($applicant_data && $limit !="-1"):?>	
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
					url: "<?php echo base_url('hrd/applicant_data/');?>" + "/" + page,
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