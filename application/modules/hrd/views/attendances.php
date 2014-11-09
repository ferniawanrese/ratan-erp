<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Attendances</li> 
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"> Attendances</h3> 
										</div> 		
										<div class="well col-sm-12 col-md-12">
										
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
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/attendances_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					$('.my_loadie_container').loadie(1);
				}			
			});

}
  </script>
