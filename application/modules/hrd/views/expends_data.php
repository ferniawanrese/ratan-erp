
Expenses Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
	<thead>
		  <tr>  
				<th> Employee </th> 
				<th> Date </th> 
				<th> Description </th>   
				<th> Currency </th> 
				<th> Total Amount </th>
				<th>  State </th> 
				<th>  Action </th>
		  </tr>
	</thead> 
	<tbody>
	 
			<?php if($expends_data):?>
			 <?php foreach($expends_data as $dat):?>
				<tr>			
					<td>
					<?php echo $dat['employee_name'];?>	 
					</td>
					<td>
					<?php echo date('d M Y',strtotime($dat['date']));?>
					</td>
					<td>
					<?php echo $dat['description'];?>	 
					</td> 
					<td>
					<?php echo $dat['currency_code'];?>	 
					</td> 
					<th style = "text-align: right;">
					  <?php echo number_format($dat['total_amount'], 2,$dat['currency_format_decimal'], $dat['currency_format_separator']);?>	 
					</th>
					<td>
					
						<div class="btn-toolbar row-action">  
									<?php echo $dat['state'];?>	
									
									<?php if($dat['approved']==0 && $dat['state']!="Refused"):?>
									 <a href = "#" onclick = "approved('1','<?php echo $dat['expense_ID'];?>')"><i class="icon-ok-sign"></i> Confirm </a>
									 <a href = "#" onclick = "approved('0','<?php echo $dat['expense_ID'];?>')"><i class="icon-remove-sign"></i> Refuse</a>
									 <?php endif;?>
						</div>
					</td> 
					<td class="center">
							<div class="btn-toolbar row-action">  
									<button class="btn btn-primary" title="Print" onclick=print_("<?php echo $dat['expense_ID'];?>")><i class="icon-print"></i></button>
									<button class="btn btn-info" title="Edit" onclick=expends_add("<?php echo $dat['expense_ID'];?>")><i class="icon-edit"></i></button>
									<button class="delete btn btn-danger" title="Delete" onclick=delete_post("<?php echo $dat['expense_ID'];?>")><i class="icon-trash "></i></button> 
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
<?php if($expends_data && $limit!=-1):?>
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
					url: "<?php echo base_url('hrd/expends_data/');?>" + "/" + page,
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
</script>


					
						
		