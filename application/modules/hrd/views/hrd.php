
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li class="active">HRD</li>
					</ul>

					<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Employee Data </h3>
											
										</div>
																			
										<div class="well col-sm-12 col-md-12">
										
											<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_employee()"> Create</button>
												<button class="btn btn-inverse btn-large icon-file-alt" type="button" onclick = "exportdata()"> Export to Excel</button>
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
											</div>
											
											<div   id = "btn-list" class="form-group">
												<button class="btn btn-inverse icon-list" type="button" onclick = "display_data()" > Data List</button>
											</div>
											
										
											<span  id ="search" style = "display: none;">	
												<!-- searching -->
											 <form id = "form_filter" name="form_filter" method="post">
												
											<fieldset class="default panel">
											<legend> Filtering </legend>
											
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-text"></label>
													<div class="input-group col-sm-12 col-md-12">
														<input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="name" >		
														<span class="input-group-addon "></span>
													</div>
												</div>
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-optional"></label>
													<div class="input-group col-sm-12 col-md-12">
														<select class="form-control" name="employee_divisionID" id="employee_divisionID" >
															<option value = "">[division]</option>
														</select>
														<span class="input-group-addon info"><span class="icon-plus" style = "cursor:pointer;"></span></span>
													</div>
												</div>
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-email"></label>
													<div class="input-group col-sm-12 col-md-12" >
														<select class="form-control" name="employee_positionID" id="employee_positionID" >
															<option  value = "">[position]</option>
														</select>
														<span class="input-group-addon info"><span class="icon-plus" style = "cursor:pointer;"></span></span>
													</div>
												</div>
												
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-number"></label>
													<div class="input-group col-sm-12 col-md-12" data-validate="number">
														<input type="text" class="form-control" name="employee_managerID" id="employee_managerID" placeholder="manager" >
														<span class="input-group-addon danger"></span>
													</div>
												</div>
												
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-number"></label>
													<div class="input-group col-sm-12 col-md-12" data-validate="number">
														<select class="form-control" name="orderby" id="orderby" >
																<option value = "">[order by]</option>
																<?php foreach($filterplus as $filterpluss):?>
																<option value = "<?php echo $filterpluss['COLUMN_NAME'];?>"><?php echo $filterpluss['COLUMN_COMMENT'];?></option>
																<?php endforeach;?>
															</select>
															<input type = "hidden" name = "ascdsc" id = "ascdsc" value = "ASC">
															<span class="input-group-addon "><i class = "icon-arrow-up" title = "Ascending" style = "cursor:pointer;"></i></span>
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
														<span class="input-group-addon "></span>
													</div>
												</div>
												
												<span class = "additional"></span>
												
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-number"></label>
													<div class="input-group col-sm-12 col-md-12" data-validate="number">													
														<select class="form-control" name="additionalfilter" id="additionalfilter" placeholder="[additional filter]">
																<option value="" selected disabled>[additional filter]</option>
																<?php foreach($filterplus as $filterpluss):?>
																<option value = "<?php echo $filterpluss['COLUMN_NAME'];?>"><?php echo $filterpluss['COLUMN_COMMENT'];?></option>
																<?php endforeach;?>
														</select>
															<span class="input-group-addon "></span>
													</div>
												</div>
												
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-number"></label>
													<div class="input-group col-sm-12 col-md-12" data-validate="number">													
														<select class="form-control" name="additionalcolums" id="additionalcolums" placeholder="[additional filter]">
																<option value="" selected disabled>[more colums]</option>
																<?php foreach($filterplus as $filterpluss):?>
																<option value = "<?php echo $filterpluss['COLUMN_NAME'];?>"><?php echo $filterpluss['COLUMN_COMMENT'];?></option>
																<?php endforeach;?>
														</select>
															<span class="input-group-addon "></span>
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
							
<script>

$( "#additionalfilter" ).change(function() {
	var e = this.value;
	$adding = 
	'<div class="additional_group form-group col-sm-12 col-md-3" id = "' + e + '">';
	$adding +=		'						<label for="validate-number"></label>';
	$adding +=		'							<div class="input-group col-sm-12 col-md-12" data-validate="number">';
	$adding +=		'										<input type="text" class="form-control" name="filterplus['+e+']" id="filterplus['+e+']" placeholder="'+e+'">';
	$adding +=		'									<span class="input-group-addon "><i class = "icon-remove-sign" style = "cursor:pointer;" onclick = delfilter("' + e + '")></i></span>';
	$adding +=		'								</div>';
	$adding +=		'							</div>';


	$( ".additional" ).append($adding);
	$( "#additionalfilter" ).val('');
});

	$( "#additionalcolums" ).change(function() {
	$( ".additionalcolums" ).append("<th> Start Working </th>");
	$( "#additionalcolums" ).val('');
});

function delfilter(e){
$( "#"+e).remove();
}

display_data();

function display_data(){
	
	$('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/hrd_employe_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					$('.my_loadie_container').loadie(1);
				}			
			});

}

function add_employee(){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					$('body').loadie(1);
				}  
			});

}
</script>


<script>

	$("form#form_filter").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/hrd_employe_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					$('body').loadie(1);
				}
			});
			
			return false;
	});


function exportdata(){

$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/hrd_employe_data_export');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
						$('body').loadie(1);
				}
			});
			
}
</script>


<script>

function edit_employee(a){

	
	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();

	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>/" + a,
				success: function(data){     
					$( ".list" ).html(data); 
					$('body').loadie(1);
				}  
			});

}

function clearfilter(){
$('#limit').val('10');
$('#employee_name').val('');
$('#employee_divisionID').val('');
$('#employee_positionID').val('');
$('#employee_managerID').val('');
$('#orderby').val('');
$('#ascdsc').val('');
$('.additional_group').remove();
display_data();
}


			
function delete_post(a){
	
	bootbox.confirm("Are you sure?", function (result) {
                  
					if(result == true){						
						$.ajax({
									url: "<?php echo base_url('hrd/hrd_delete_employee/')?>/" + a,									
									success: function(data)
									{											
											display_data();
									}
						});
					}
					
                });
}
</script>

	
<script>
function close_filter(){											
$("#search").hide();
$("#Show").show();
$("#Hide").hide();
}
function open_filter(){											
$("#search").show();
$("#Hide").show();
$("#Show").hide();
}
</script>