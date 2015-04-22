<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Applicant</li> 
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"> Applicants</h3> 
										</div> 	
										<ul class="top-right-toolbar"> 
											<li><a href="" onclick="exportdata()"  class="brown" title="Export to excel"><i class="icon-download-alt"></i></a></li> 
											<li> </li> 
										</ul>
										<div class="well col-sm-12 col-md-12">
										
											<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_appraisal()"> Create</button> 
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
														<input type="text" class="form-control" id="applicant_name" name="filter[applicant_name]" placeholder="applicant name" >	 
													</div>
												</div>
												
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-email"></label>
													<div class="input-group col-sm-12 col-md-12" >
														<select class="form-control" name="filter[stage]" id="stage" >
															<option  value = "">-- Choose Stage --</option>
															<option>Initial Qualification</option>
															<option >Fisrt Interview</option>
															<option>Second Interview</option>
															<option >Contract Porposed</option>
															<option >Refused</option>
														</select> 
													</div>
												</div>
												
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-optional"></label>
													<div class="input-group col-sm-12 col-md-12">
														<select class = "form-control" id = "sdepartment_ID" name = "department_ID">
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
														<select class="form-control" name="job_ID" id="semployee_positionID" >
															<option  value = "-1">[position]</option>
															
														</select>
														
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
</div> 		



<script>
display_data();
function display_data(){

	NProgress.inc();
	$('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
		type: "POST",
		url:'<?php echo base_url('hrd/applicant_data');?>',
		data: $("#form_filter").serialize(),
				success: function(data){
		 
					$( ".list" ).html(data); 		
					NProgress.done(true);
				} 
	})
}

function add_appraisal(){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	NProgress.inc();
	$.ajax({
				
				url: "<?php echo base_url('hrd/add_applicant/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}


function applicant_update(a){
	NProgress.inc();	
	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/add_applicant/');?>" +"/"+ a,
				success: function(data){     
					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}

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

$("form#form_filter").submit(function(e){
	
	e.preventDefault();
			NProgress.inc();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/applicant_data');?>",
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

$('#limit').val('10');
$('#sdepartment_ID').val('');
$('#semployee_positionID').val(''); 
$('#applicant_name').val(''); 
$('#stage').val(''); 
display_data();
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

function exportdata(){

window.open('<?php echo base_url('hrd/applicant_data_excel');?>?'+$("#form_filter").serialize());
 
}
</script>