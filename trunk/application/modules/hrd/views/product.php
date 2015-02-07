<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Configuration</li>
	<li class="active">Goods</li>
	<li class="active">Product</li>
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Product Data </h3>
										</div> 
										<div class="well col-sm-12 col-md-12">
										<form id = "form_filter" action ="<?php echo base_url('hrd/hrd_save_employee/');?>" method="post">
											<div class = "col-md-3 btn-create">
												<input type ="text" name ="search" id="search" class="form-control" placeholder="Product Name">
											</div> 
											<div class = "btn-create form-group"> 
												<button class="btn btn-default btn-large  " type="button" onclick = "display_data()"> Seacrh!</button>
												<button class="btn btn-default btn-large  " type="button" onclick = "clean()"> Clean</button>
											</div>
										</form>	
											<div class = "col-md-3 btn-create form-group "  >
											 <button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_product()"  > Create</button>
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

function what_next(){
clean(); 
}
 
function clean(){
$("#search").val(""); 
display_data();
}

display_data();
function display_data(){ 
	$('#btn-list').hide();
	$('.btn-create').show();
	NProgress.inc();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/product_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
				}			
			});

}


function add_product(){
 
	$('#btn-list').show();
	$('.btn-create').hide();
	NProgress.inc();
	$.ajax({
				
				url: "<?php echo base_url('hrd/product_add/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}


function update_product(a){
 
	$('#btn-list').show();
	$('.btn-create').hide();
	NProgress.inc();
	$.ajax({
				
				url: "<?php echo base_url('hrd/product_add/');?>" + "/" + a,
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
									url: "<?php echo base_url('hrd/product_delete/')?>/" + a,									
									success: function(data)
									{											
											display_data();
									}
						});
					}
					
                });
}
</script>