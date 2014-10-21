<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class=" "> Time Tracking</li>
	<li class="active">Register Time</li>
</ul>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Register Time </h3>
											
										</div>
																			
										<div class="well col-sm-12 col-md-12">
										
										<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_timesheet()"> Create</button>
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
														<legend> Filter Timesheet </legend>
													 
														<div class="form-group col-sm-12 col-md-3">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input   class="form-control" type="text" placeholder="Notes" name="filter[description]" id = "description"> 
															</div> 
														</div>
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<select class="form-control {validate:{required:true}}" name = "project_ID" id = "project_ID"> 
																	<option value = "" >-- Choose Department --</option>
																	<?php foreach($project as $projects):?>
																	<option value = "<?php echo $projects['project_ID'];?>"><?php echo $projects['project_name'];?></option>
																	<?php endforeach;?>
																</select>
																 
															</div>
														</div>
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<select class="form-control {validate:{required:true}}" name = "project_ID" id = "project_ID"> 
																	<option value = "" >-- Choose Project --</option>
																	<?php foreach($project as $projects):?>
																	<option value = "<?php echo $projects['project_ID'];?>"><?php echo $projects['project_name'];?></option>
																	<?php endforeach;?>
																</select>
															 
															</div>
														</div>														
														<div class="form-group col-sm-12 col-md-3"> 
															<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<select class="form-control {validate:{required:true}}" name = "task_ID" id = "task_ID">
																	<option value = "" >-- Choose Task --</option>
																	<?php foreach($task as $tasks):?>
																	<option value = "<?php echo $tasks['task_ID'];?>"><?php echo $tasks['task_name'];?></option>
																	<?php endforeach;?>
																	
																</select>
															 
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


 function list_employee(a){
	 $.ajax({
			 url: "<?php echo base_url('hrd/timeregister_employeelist/');?>" + "/" + a,
			success: function(data){      
			$( "#modal_body" ).html(data); 		 
			$( "#modal_label" ).html("Employee Listed"); 	
			}  
	 
	 })
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
 
display_data();

function display_data(){ 
	 $('#btn-list').hide();
	$('#btn-create').show();
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_registerdata/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					$('.my_loadie_container').loadie(1);
				}			
			});

}

function delfilter(e){
$( "#"+e).remove();
}
 

function add_timesheet(){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/timesheet_add/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					$('body').loadie(1);
				}  
			});

}

function update_timesheet(a){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/timesheet_add/');?>" +"/"+ a,
				success: function(data){     

					$( ".list" ).html(data); 		
					$('body').loadie(1);
				}  
			});

}


function delete_post(a){
	
	bootbox.confirm("Are you sure you want to delete this?", function (result) {
                  
					if(result == true){						
						$.ajax({
									url: "<?php echo base_url('hrd/timesheet_deleted/')?>/" + a,									
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

	$("form#form_filter").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/timesheet_registerdata');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					$('body').loadie(1);
				}
			});
			
			return false;
	});
	
	function clearfilter(){
			$('#register_date').val('');
			$('#deadline_date').val('');
			$('#description').val('');
			$('.additional_group').remove();
			display_data();
	}
	
		$('.datetimepicker').datetimepicker({
            language: 'en',
			pickTime: false
        });
</script>
	