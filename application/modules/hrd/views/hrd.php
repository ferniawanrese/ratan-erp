
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Data</li>
					</ul>

					<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
							
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"><i class="icon-th-list"></i> Search Employee Data </h3>
										</div>
										<div class="well col-sm-12 col-md-12">
											<span = id ="search">	
												<!-- searching -->
											 <form id = "form_filter" name="form_filter" method="post">
												<fieldset class="default">
												<legend>Filtering</legend>
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
															<option>[division]</option>
														</select>
														<span class="input-group-addon info"><span class="icon-plus"></span></span>
													</div>
												</div>
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-email"></label>
													<div class="input-group col-sm-12 col-md-12" >
														<select class="form-control" name="employee_positionID" id="employee_positionID" >
															<option>[position]</option>
														</select>
														<span class="input-group-addon "></span>
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
																<option >[order by]</option>
																<?php foreach($filterplus as $filterpluss):?>
																<option value = "<?php echo $filterpluss['COLUMN_NAME'];?>"><?php echo $filterpluss['COLUMN_COMMENT'];?></option>
																<?php endforeach;?>
															</select>
															<input type = "hidden" name = "ascdsc" id = "ascdsc" value = "ASC">
															<span class="input-group-addon "><i class = "icon-arrow-up" title = "Ascending" style = "cursor:pointer;"></i></span>
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
														<button type = "submit" class="btn btn-default"  > Search!</buttton>
														<button type = "button" class="btn btn-default" onclick = "clearfilter()" > Clear Filter</buttton>
													</div>
												</div>
												</fieldset>
											 </form>
											</span>
											
											<div class="form-group col-sm-12 col-md-3" id = "btn-create">
												<button class="btn btn-success icon-plus" type="button" onclick = "add_employee()"> Create</button>
											</div>
											<div class="form-group col-sm-12 col-md-3"  id = "btn-list">
												<button class="btn btn-success icon-list" type="button" onclick = "display_data()" > Data List</button>
											</div>
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
$adding +=		'										<input type="text" class="form-control" name="'+e+'" id="'+e+'" placeholder="'+e+'">';
$adding +=		'									<span class="input-group-addon "><i class = "icon-remove-sign" style = "cursor:pointer;" onclick = delfilter("' + e + '")></i></span>';
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

	$('.progress-bar').show();
	$('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_employe_data/');?>",
				success: function(data){     

					$( ".list" ).html(data); 
					$('#search').show();
					$('.progress-bar').hide();
					
				}  
			});

}

function add_employee(){

	$('.progress-bar').show();
	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					$('.progress-bar').hide();
					
				}  
			});

}
</script>

<script>

	$("form#form_filter").submit(function(e){
	
	$('.progress-bar').show();
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/hrd_employe_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( "#offerdata_list" ).html(data);
						
						$('.progress-bar').hide();
				}
			});
			
			return false;
	});

</script>


<script>
function delete_post(a){
	$('.progress-bar').show();
	$.ajax({
				url: "<?php echo base_url('hrd/hrd_delete_employee/')?>/" + a,
		        
				success: function(data)
			    {
						$('.progress-bar').hide();
						display_data();
			    }

	});
}

function edit_employee(a){

	$('.progress-bar').show();

	$.ajax({
				
				url: "<?php echo base_url('hrd/hrd_addemployee/');?>/" + a,
				success: function(data){     

					$( ".list" ).html(data); 
					$('.progress-bar').hide();
				}  
			});

}

function clearfilter(){
$('.progress-bar').show();
$('#employee_name').val('');
$('#employee_divisionID').val('');
$('#employee_positionID').val('');
$('#employee_managerID').val('');
$('#orderby').val('');
$('#ascdsc').val('');
$('.additional_group').remove();
$('.progress-bar').hide();
}
</script>