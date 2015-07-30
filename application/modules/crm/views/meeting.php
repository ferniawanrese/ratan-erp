<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li class="active">Meeting</li>
</ul>
					
		<div class="primary-head">
			<!--content-->
			<div class="row-fluid">
						<div class="content-widgets gray">
							<div class="widget-head blue clearfix">
								<h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Meeting Data </h3> 
							</div>
							<ul class="top-right-toolbar"> 
								<li><a href="" onclick="exportdata()"  class="brown" title="Export to excel"><i class="icon-download-alt"></i></a></li> 
								<li> </li> 
							</ul>
																
							<div class="well col-sm-12 col-md-12">
							
								<div  id = "btn-create" class="form-group">
									<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_meeting()"> Create</button> 
									<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
									<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
								</div>
								
								<div   id = "btn-list" class="form-group">
									<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
								</div>
								
							
								<span  id ="search" style = "display: none;">	
									<!-- searching -->
								 <form id = "form_filter" name="form_filter" method="post">
									
								<fieldset class="default panel">
								<legend> Filtering </legend>
								
									<div class="form-group col-sm-12 col-md-3">
										<label for="validate-text"></label>
										<div class="input-group col-sm-12 col-md-12">
											<input type="text" class="form-control" id="search2" name="search" placeholder="Search" >	 
										</div>
									</div>
								 
									<span class = "additional"></span>
									 
									<div class="form-group col-sm-12 col-md-3">
										<label for="validate-email"></label>
										<div class="input-group col-sm-12 col-md-12" >
											<select class="form-control" name="limit" id="limit" >
												<option value = "10">Limit 10</option>
												<option value = "20">Limit 20</option>
												<option value = "50">Limit 50</option>
												<option value = "100">Limit 100</option>
												<option value = "-1">All Data</option>
											</select> 
										</div>
									</div>
									 
									<div class="form-group col-sm-12 col-md-3">
										<label for="validate-email"></label>
										<div class="input-group col-sm-12 col-md-12" >
											<span class = "btn-group">
												<button type = "submit" class="btn btn-default"  > Search!</buttton>
												<button type = "button" class="btn btn-default" onclick = "clearfilter()" > Clear Filter</buttton>
											</span>
										</div>													
									</div>
									
									</fieldset>
								 </form>
								</span>
								 
								<div class = "list col-sm-12 col-md-12">
									<!-- content ajax -->											
								</div>

							</div>
						</div>
					
			</div>
			<!--end content-->
		</div>
		
		<!-- dialog contents on hidden div -->   
 
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header modal-header-primary">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class = "icon-remove"></i></button>
					<h1><span id = "modal_label"></span></h1>
				</div>
				<div class="modal-body" id = "modal_body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

		

<script>
 
display_data();

function display_data(){ 

	NProgress.inc();
	$('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('crm/crm_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
				}			
			});

}

$("form#form_filter").submit(function(e){
	NProgress.inc();
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('crm/crm_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					NProgress.done(true);
				}
			});
			
			return false;
	});

function close_filter(){											
$("#search").hide();
$("#Show").show();
$("#Hide").hide();
}
function open_filter(){											
$("#search").fadeIn();
$("#Hide").show();
$("#Show").hide();
}


function clearfilter(){
 
$('#search2').val('');
$('#limit').val('10'); 
display_data();
}


function add_meeting(a){
	
	NProgress.inc();
	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('crm/add_meeting/');?>" +"/"+a,
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
									url: "<?php echo base_url('crm/crm_delete/')?>/" + a,									
									success: function(data)
									{											
											display_data();
									}
						});
					}
					
                });
}
</script>
					