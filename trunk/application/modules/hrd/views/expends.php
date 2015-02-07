<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class=" "> Expenses</li> 
</ul>
 
<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Expenses </h3>
											
										</div>
																			
										<div class="well col-sm-12 col-md-12">
										
											<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "expends_add()"> Create</button> 
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
														<legend> Filter Timesheet </legend>
													 
														<div class="form-group col-sm-12 col-md-3">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input   class="form-control" type="text" placeholder="Notes" name="filter[description]" id = "description"> 
															</div> 
														</div>
														
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-email"></label>
															<div class="input-group col-sm-12 col-md-12" >
																<select class="form-control" name="limit" id="limit" >
																	<option value = "10">Limit 10</option>
																	<option value = "20">Limit 20</option>
																	<option value = "50">Limit 50</option>
																	<option value = "100">Limit 100</option>
																</select>
																 
															</div>
														</div>
														
														<div class="form-group col-sm-12 col-md-3"> 
															<label for="validate-number"></label>
															<div class="input-group col-sm-12 col-md-12">
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
</div>			
 
<!-- dialog contents on hidden div -->   

<script>

function close_filter(){											
$("#search").fadeOut();
$("#Show").show();
$("#Hide").hide();
}

function open_filter(){											
$("#search").fadeIn();
$("#Hide").show();
$("#Show").hide();
}
 
 

display_data();

function display_data(){ 
	 $('#btn-list').hide();
	$('#btn-create').show();
	NProgress.inc();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/expends_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
				}			
			});

}


function expends_add(a){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	NProgress.inc();
	$.ajax({
				
				url: "<?php echo base_url('hrd/expends_add/');?>"+"/"+a,
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}


	$("form#form_filter").submit(function(e){
	
	e.preventDefault();
			NProgress.inc();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/expends_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					NProgress.done(true);
				}
			});
			
			return false;
	});
	
	function clearfilter(){
			$('#register_date').val(''); 
			$('.additional_group').remove();
			display_data();
	}
	
	function approved(a,b){
	
		$.ajax({ 
				url: "<?php echo base_url('hrd/expends_approval/');?>"+"/"+a+"/"+b,
				data: '',
				success: function(data)
				{
					display_data();
				}
			});
	
	}
</script>