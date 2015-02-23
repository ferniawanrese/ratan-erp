<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Weekend</li>	
</ul>


<div class="primary-head">
		<!--content-->
		<div class="row-fluid">
					<div class="content-widgets gray">
						<div class="widget-head blue clearfix">
						  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Weekend Setting </h3>							
						</div>
															
						<div class="well col-sm-12 col-md-12">
						 
							<div class = "col-md-3 btn-create form-group "  >
							 <button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "weekend_add()"  > Create</button>
							</div>
							<div   id = "btn-list" class="form-group">
								<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
							</div>
							<div class = "list col-sm-12 col-md-12">
								<!-- content ajax -->											
							</div>
							
						</div> 
					</div>
		</div>
</div>	

<script>

display_data();

function display_data(){ 
	$('#btn-list').hide();
	$('.btn-create').show();
	NProgress.inc();	
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/weekend_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
				}			
			});

}


function weekend_add(){
	NProgress.inc();	
	$('#btn-list').show();
	$('.btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/weekend_add/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}


function delete_post(a){
	
	bootbox.confirm("Are you sure delete this item?", function (result) {
                  
					if(result == true){						
						$.ajax({
									url: "<?php echo base_url('hrd/allowance_deleted/')?>/" + a,									
									success: function(data)
									{											
											display_data();
									}
						});
					}
					
                });
}


</script>