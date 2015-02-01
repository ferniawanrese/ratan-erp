  
	<form  id = "depAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
				
		<div class="col-md-12">	
				<div class="form-group"  >    
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Employee :</label>
						<div class="control col-md-4">
							<input name="employee"  id = "employee" class="form-control employee" type="text"    /> 
							<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"    />
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Description :</label>
						<div class="control col-md-4">
							<textarea name= "description" id = "description" class = "form-control"></textarea>
						</div>
					</div>
				 
					<div class="form-group">
						<label  class="col-sm-3 control-label">Currency :</label>
						<div class="control col-md-4">
							<span class = "input-group  "> 
								<select class = "form-control">
									<?php foreach($currency as $cur):?>
									<option><?php echo $cur['currency_code'];?></option> 
									<?php endforeach;?>
								</select>
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_department()"></i>
								</span>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Date :</label>
						<div class="control col-md-3">
							<div id="datetimepicker4" class="input-append datetimepicker">
								<span class="add-on">
								<input  type="text" class = "form-control datepicker" id = "date" name = "date" value = "">
								</span>																	
						</div>																													
						</div>																									
					</div> 
					  
				</div>
 
				<div class="stepy-widget">
					 
					<div class="widget-container gray ">
						Expense Lines <button class="btn btn-blue icon-plus" onclick="add_detail()" type="button" data-target="#myModal" data-toggle="modal"  > Create</button><div></br></div>
						 <table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;">
							<thead>
								  <tr>  
										<th> Product </th> 
										<th> Expense Note </th> 
										<th> Reference </th>   
										<th> Unit Price </th> 
										<th> Quantity </th>
										<th>  Total </th> 
										<th>  Action </th>
								  </tr>
							</thead> 
							<tbody>
										<tr>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
										</tr>
										<tr>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
										</tr>
										<tr>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
											<td>asd</td>
										</tr>
							</tbody>
	
						<table>
					</div>
				</div>
				 
		</div>							  
</form>		

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
 
 function add_detail(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/expends_detail_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Expense Lines"); 		 
			}  
	 
	 })
 }

load_data();
function load_data(){

	$.ajax({
	
		url:"<?php echo base_url('hrd/appraisal_datac');?>",
		success: function(data){      
					$( ".data_load" ).html(data); 		 
		} 
	 
	});

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
</script>
 
<script>
  $('#date').datepicker({
  format:"dd-mm-yyyy"
  }); 
</script>	


