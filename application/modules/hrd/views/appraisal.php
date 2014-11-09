<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Appraisal</li> 
</ul>

<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"> Appraisal</h3> 
										</div> 		
										<div class="well col-sm-12 col-md-12">
										
											<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_appraisal()"> Create</button>
												<!--<button class="btn btn-inverse btn-large icon-file-alt" type="button" onclick = "exportdata()"> Export to Excel</button>-->
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
														<input type="text" class="form-control" id="employee_name" name="filter[employee_name]" placeholder="employee name" >	 
													</div>
												</div>
												 
												<div class="form-group col-sm-12 col-md-3">
													<label for="validate-email"></label>
													<div class="input-group col-sm-12 col-md-12" >
														<select class="form-control" name="employee_positionID" id="employee_positionID" >
															<option  value = "">[Plan]</option>
														</select>
														<span class="input-group-addon "><i class = "icon-plus" title = "Ascending" style = "cursor:pointer;"></i></span>
													</div>
												</div>
												  
												<div class="form-group col-sm-12 col-md-6">
													<label for="validate-text"></label>
													
													<div class="  btn-group input-group col-sm-12 col-md-12 ">
														<label class="btn btn-default">
															<input type="checkbox" name="Pending">  Pending <i class = "icon-ok-sign"></i>
														 </label>
														 <label class="btn btn-default">
															<input type="checkbox" name="Progess">  Progess <i class = "icon-ok"></i>
														 </label>
														 <label class="btn btn-default">
															<input type="checkbox" name="Pending">  7 Days <i class = "icon-calendar"></i>
														 </label>
														 <label class="btn btn-default">
															<input type="checkbox" name="Pending">  Late <i class = "icon-time"></i>
														 </label>
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
	$('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
		url:'<?php echo base_url('hrd/appraisal_data');?>',
		success: function(data){     
		 
					$( ".list" ).html(data); 		
					$('body').loadie(1);
				} 
	})
}

function add_appraisal(){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	
	$.ajax({
				
				url: "<?php echo base_url('hrd/add_appraisal/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					$('body').loadie(1);
				}  
			});

}

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
</script>