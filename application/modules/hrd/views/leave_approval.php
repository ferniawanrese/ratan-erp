<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li> 
	<li class="active">Leaves</li>
	<li class="active">Leave Approval</li>
</ul>
  
<div class="primary-head">
		<!--content-->
		<div class="row-fluid">
					<div class="content-widgets gray">
						<div class="widget-head blue clearfix">
						  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Leave Approval   </h3>
						</div> 
						<ul class="top-right-toolbar"> 
							<li><a href="" onclick="exportdata()"  class="brown" title="Export to excel"><i class="icon-download-alt"></i></a></li> 
							<li> </li> 
						</ul>
						<div class="well col-sm-12 col-md-12">
						  
							<div  id = "btn-create" class="form-group"> 
									<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "leave_add()"> Create</button> 
									<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
									<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
							</div>
							 
							<div   id = "btn-list" class="form-group">
								<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
							</div>
							
							<span  id ="searchx" style = "display: none;">	
											<!-- searching -->
											 <form id = "form_filter" name="form_filter" method="post">
												<fieldset class="default panel">
														<legend> Filter Timesheet </legend>
														
														<div class="form-group col-sm-12 col-md-3">
															<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input   id = "employee" class="form-control employee {validate:{required:true}}" type="text"  placeholder = "Employee"  /> 
																<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"  value = ""   />
															</div>
														</div>
														
														<div class="form-group col-sm-12 col-md-3">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<select class = "form-control" type = "text" id = "leave_typeID" name = "leave_typeID">
																		<option value = "" > -- Leave Type --</option>
																	<?php foreach($leave_type as $type):?> 
																		<option value = "<?php echo $type['leave_typeID'];?>"  ><?php echo $type['leave_type_name'];?></option>
																	<?php endforeach;?> 
																</select>
															</div> 
														</div>
														 
														<div class="form-group col-sm-12 col-md-3">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input type ="text" name ="date_start" id="date_start" class="form-control" placeholder="Date Start">
															</div> 
														</div>
														<div class="form-group col-sm-12 col-md-3">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input type ="text" name ="date_end" id="date_end" class="form-control" placeholder="End Date"> 
															</div> 
														</div>														
														<div class="form-group col-sm-12 col-md-3">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<input type ="text" name ="search" id="search" class="form-control" placeholder="Note"> 
															</div> 
														</div>  
														
														<div class="form-group col-sm-12 col-md-3">  
														<label for="validate-text"></label>
															<div class="input-group col-sm-12 col-md-12">
																<select class = "form-control" type = "text" id = "approved" name = "approved">
																		<option value = "" > -- Approval --</option>
																	    <option value = "1" >Approved</option>
																		<option value = "0" >No Status</option>
																		<option value = "-1" >Refused</option>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header modal-header-warning">
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

	function what_next_leave_type(){

	display_data();

	}
	
	
$("form#form_filter").submit(function(e){
	
	e.preventDefault();
			NProgress.inc();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/leave_approval_data');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					$( ".list" ).html(data);
					NProgress.done(true);
				}
			});
			
			return false;
	});


	display_data();
	function display_data(){ 
		$('#btn-list').hide();
		$('#btn-create').show();
		NProgress.inc();
		$.ajax({
					type: "POST",
					url: "<?php echo base_url('hrd/leave_approval_data/');?>",
					data: $("#form_filter").serialize(),
					success: function(data){     
						$( ".list" ).html(data); 								
						NProgress.done(true);
					}			
				});

	}
	 
	function clearfilter(){
			
			$('#employee_ID').val('');
			$('#employee').val('');
			$('#date_start').val('');
			$('#date_end').val('');
			$('#search').val('');  
			$('#leave_typeID').val(''); 
			$('#approved').val(''); 
			$('#limit').val('10'); 
			display_data();
	}

	function leave_add(a){
	 
		$('#btn-list').show();
		$('#searchx').hide();
		$('#btn-create').hide();
		NProgress.inc();
		$.ajax({
					
					url: "<?php echo base_url('hrd/leaves_add/');?>"+"/"+a,
					success: function(data){     

						$( ".list" ).html(data); 		
						NProgress.done(true);
					}  
				});

	}

	function what_next_leave_add(){
		display_data();
	}

	function delete_post(a){
		
		bootbox.confirm("Are you sure delete this item?", function (result) {
					  
						if(result == true){						
							$.ajax({
										url: "<?php echo base_url('hrd/leave_approval_delete/')?>/" + a,									
										success: function(data)
										{											
												display_data();
										}
							});
						}
						
					});
	}

	function approved(a,b){
	
		$.ajax({ 
				url: "<?php echo base_url('hrd/leaves_approval/');?>"+"/"+a+"/"+b,
				data: '',
				success: function(data)
				{
					display_data();
				}
			});
	
	}
	
function exportdata(){

window.open('<?php echo base_url('hrd/leave_approval_data_excel');?>?'+$("#form_filter").serialize());
 
}

function print_r(a){

window.open('<?php echo base_url('hrd/leave_approval_pdf');?>/' + a);
 
}


$(function() {
		$( ".employee" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#employee_ID").val(id);
				}  
		}); 
	}); 
	
	
$('#date_end').datepicker({
  format:"dd-mm-yyyy"
});  

$('#date_start').datepicker({
  format:"dd-mm-yyyy"
});  
</script>


	
<script>
function close_filter(){											
$("#searchx").hide();
$("#Show").show();
$("#Hide").hide();
}
function open_filter(){											
$("#searchx").fadeIn();
$("#Hide").show();
$("#Show").hide();
}
</script>