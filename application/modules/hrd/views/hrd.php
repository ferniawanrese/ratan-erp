
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
										<ul class="top-right-toolbar"> 
											<li><a href="" onclick="exportdata()"  class="brown" title="Export to excel"><i class="icon-download-alt"></i></a></li> 
											<li> </li> 
										</ul>
																			
										<div class="well col-sm-12 col-md-12">
										
											<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_employee()"> Create</button> 
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
														<input type="text" class="form-control" id="employee_name" name="filter[employee_name]" placeholder="name" >	
														 
													</div>
												</div>
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-optional"></label>
													<div class="input-group col-sm-12 col-md-12">
														<select class = "form-control" id = "sdepartment_ID" name = "sdepartment_ID">
																<option value = "-1">-- Choose Department --</option>
														<?php foreach($department_data as $dep):?>
															<?php if($dep['department_parentID'] == '0'):?>
																<option value = "<?php echo  $dep['department_ID'];?>"><?php echo  $dep['department_name'];?></option>
															<?php else:?>
																<option value="<?php echo  $dep['department_ID'];?>"><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
															<?php endif;?>										
														<?php endforeach;?>	 
													 </select>
													</div> 
												</div>
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-email"></label>
													<div class="input-group col-sm-12 col-md-12" >
														<select class="form-control" name="semployee_positionID" id="semployee_positionID" >
															<option  value = "-1">[position]</option>
															
														</select>
														
													</div>
												</div>
												 
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-number"></label>
													<div class="input-group col-sm-12 col-md-12" data-validate="number">
														<input type="text" class="form-control employee_managerName"  id="employee_manager" placeholder="manager" > 
														<input type="hidden" class="form-control  " name="manager_ID" id="employee_managerIDx" > 
													</div>
												</div>
												
												<span class = "additional"></span>
												
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-number"></label>
													<div class="input-group col-sm-12 col-md-12" data-validate="number">													
														<select class="form-control" name="additionalfilter" id="additionalfilter" placeholder="[additional filter]">
																<option value="" selected disabled>[additional filter]</option>
																<?php foreach($filterplus as $filterpluss):?>
																<option value = "<?php echo $filterpluss['COLUMN_COMMENT'];?>" myTag="<?php echo $filterpluss['COLUMN_NAME'];?>"><?php echo $filterpluss['COLUMN_COMMENT'];?></option>
																<?php endforeach;?>
														</select>
															 
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
															<span class="input-group-addon " id = "ascx"><i class = "icon-arrow-up" title = "Ascending" style = "cursor:pointer;"  onclick ="urutan('DESC')" ></i></span>
															<span class="input-group-addon " id = "descx" style = "display:none;"><i class = "icon-arrow-down" title = "Descending" style = "cursor:pointer;" onclick = "urutan('ASC')" ></i></span>
													</div>
												</div>
												
												<script>
												function urutan(a){
													$('#ascdsc').val(a);
													if(a == "ASC"){
													$('#descx').hide();
													$('#ascx').show(); 
													}else{
													$('#ascx').hide();
													$('#descx').show();
													}
												}
												</script>
												
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
							
<script>

$( "#additionalfilter" ).change(function() {
	var e = this.value;
	var a = $('option:selected', this).attr('mytag');
 
	$adding = 
	'<div class="additional_group form-group col-sm-12 col-md-3" id = "' + a + '">';
	$adding +=		'						<label for="validate-number"></label>';
	$adding +=		'							<div class="input-group col-sm-12 col-md-12" data-validate="number">';
	$adding +=		'										<input type="text" class="form-control" name="filterplus['+a+']" id="filterplus['+a+']" placeholder="'+e+'">';
	$adding +=		'									<span class="input-group-addon "><i class = "icon-remove-sign" style = "cursor:pointer;" onclick = delfilter("' + a + '")></i></span>';
	$adding +=		'								</div>';
	$adding +=		'							</div>';


	$( ".additional" ).append($adding);
	$( "#additionalfilter" ).val('');
});

 

function delfilter(e){
$( "#"+e).remove();
}

display_data();

function display_data(){ 

	NProgress.inc();
	$('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/hrd_employe_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
				}			
			});

}

function add_employee(){
	
	NProgress.inc();
	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}
</script>


<script>

	$("form#form_filter").submit(function(e){
	NProgress.inc();
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/hrd_employe_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					NProgress.done(true);
				}
			});
			
			return false;
	});
 
 
function exportdata(){

window.open('<?php echo base_url('hrd/hrd_employe_data_export');?>?'+$("#form_filter").serialize());
 
}

</script>


<script>

function edit_employee(a){
	NProgress.inc();
	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();

	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>/" + a,
				success: function(data){     
					$( ".list" ).html(data); 
					NProgress.done(true);
				}  
			});

}

function clearfilter(){

$('#limit').val('10');
$('#sdepartment_ID').val('');
$('#semployee_positionID').val('');
$('#employee_managerID').val('');
$('#orderby').val('');
$('#ascdsc').val('');
$('.additional_group').remove();
$('#employee_name').val('');
$('#employee_managerIDx').val('');
$('#employee_manager').val('');
display_data();
}


			
function delete_post(a){
	
	bootbox.confirm("Are you sure you want to delete this post?", function (result) {
                  
					if(result == true){	
					 	NProgress.inc();	
						$.ajax({
									url: "<?php echo base_url('hrd/hrd_delete_employee/')?>/" + a,									
									success: function(data)
									{								
											NProgress.done(true);
											display_data();
									}
						});
					}
					
                });
}
 
		$("#sdepartment_ID").change(function() {		
					if($('#sdepartment_ID').val()!='-1'){
					var depID = $('#sdepartment_ID').val();
					}else{
					var depID = null;
					}
					 
					$.ajax({
						
						url: "<?php echo base_url('hrd/get_position/');?>" + '/' +depID,
						
						
						success: function (data) {
						 
						$( "#semployee_positionID" ).html("<option value = '-1'>-- Choose Position --</option>");
						var jsonData = JSON.parse(data); 
						
						optmin = "<option value = '-1'>-- Choose Position --</option>";
							
							if(jsonData.positionnya.length > 0){
							 
							for (var i = 0; i < jsonData.positionnya.length; i++) {
							
										var datanya = jsonData.positionnya[i];
										  
										optmin += "<option value ='"+ datanya.job_ID +"'>"+ datanya.job_name +"</option>";
										  
										$( "#semployee_positionID" ).html(optmin); 
							}
							
						}else{
										$( "#semployee_positionID" ).html(optmin); 
						}						
							
						}
					});
					
				});
				
	$(function() {
		$( ".employee_managerName" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee_managerName').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#employee_managerIDx").val(id);
				}  
		}); 
	}); 
</script>

	
<script>
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
</script>