 <style>
.btn-breadcrumb .btn:not(:last-child):after {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid white;
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: 100%;
  z-index: 3;
} 
</style> 


<form  id = "form-expends" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
		<input name="expense_ID"  id = "expense_ID" class="form-control " type="hidden"  value="<?php echo $expends_data[0]['expense_ID'];?>"  />		
		<div class="col-md-12">	
				<div class="form-group"  >    
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Employee :</label>
						<div class="control col-md-4">
							<input name="employee"  id = "employee" class="form-control employee {validate:{required:true}}" type="text"  value = "<?php echo $expends_data[0]['employee_name'];?>"  /> 
							<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"  value = "<?php echo $expends_data[0]['employee_ID'];?>"   />
						</div>
					</div>
					
					<div class="form-group">
					<label  class="col-sm-3 control-label"> Department: </label>
						<div class="control col-md-4">
								 <span class = "input-group  "> 
								 <select id = "department_ID"    class="form-control"> 
										<option value="">-- Choose Department --</option>
											<?php foreach($department_data as $dep):?>
											<?php if($dep['department_ID']==$expends_data[0]['department_ID']){$selected = "selected";}else{$selected = "";}?>
												<?php if($dep['department_parentID'] == '0'):?>
													<option value = "<?php echo  $dep['department_ID'];?>" <?php echo $selected;?>><?php echo  $dep['department_name'];?></option>
												<?php else:?>
													<option value="<?php echo  $dep['department_ID'];?>"  <?php echo $selected;?>><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
												<?php endif;?>	
												
											<?php endforeach;?>	  
									</select>
									<span class="input-group-addon ">
									<i class="icon-plus " onclick="add_department()" data-target="#myModal" data-toggle="modal" title="Add Project" style="cursor:pointer;"></i>
									</span>
									</span>
							</div>
				</div> 
				<div class="form-group">
					<label  class="col-sm-3 control-label">Project  :</label>
					<div class="control col-md-4">
						<span class = "input-group  "> 
							<select id = "project_IDx"   class="form-control "> 
								<option  value="">-- Choose Project --</option>  
							</select>
							<span class="input-group-addon ">
							<i class="icon-plus " onclick="add_project()" data-target="#myModal" data-toggle="modal" title="Add Project" style="cursor:pointer;"></i>
							</span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-3 control-label">Task :</label>
					<div class="control col-md-4">
						<span class = "input-group  "> 
							<select   id = "task_IDx" name = "task_ID" class="form-control {validate:{required:true}}"> >
								<option value="">-- Choose Task --</option>
							</select>
							<span class="input-group-addon ">
							<i class="icon-plus " onclick="add_task()" data-target="#myModal" data-toggle="modal" title="Add Task" style="cursor:pointer;"></i>
							</span>
						</span>
					</div>
				</div> 
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Description :</label>
						<div class="control col-md-4">
							<textarea name= "description" id = "description" class = "form-control"><?php echo $expends_data[0]['description'];?></textarea>
						</div>
					</div>
				 
					<div class="form-group">
						<label  class="col-sm-3 control-label">Currency :</label>
						<div class="control col-md-4">
							<span class = "input-group "> 
								<select class = "form-control" name = "currency_ID" id = "currency_ID">
									<?php foreach($currency as $cur):?>
									<?php if($cur['currency_ID']==$expends_data[0]['currency_ID']){$selected = "selected";}else{$selected = "";}?>
									<option value = "<?php echo $cur['currency_ID'];?>" <?php echo $selected;?>><?php echo $cur['currency_code'];?></option> 
									<?php endforeach;?>
								</select>
								<span class="input-group-addon ">
									<i class="icon-plus " style="cursor:pointer;" title="Add Department" data-toggle="modal" data-target="#myModal" onclick="add_currency()"></i>
								</span>
							</span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-sm-3 control-label">Date :</label>
						<div class="control col-md-3">
							<div id="datetimepicker4" class="input-append datetimepicker">
								<span class="add-on">
								<?php if($expends_data[0]['date']!=""){$datenya = date("d-m-Y", strtotime($expends_data[0]['date']));}else{$datenya=date('d-m-Y');};?>
								<input  type="text" class = "form-control datepicker {validate:{required:true}}" id = "date" name = "date" value = "<?php echo $datenya;?>">
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
										<th> UoM </th>
										<th> Sub Total </th> 
										<th> Action </th>
								  </tr>
							</thead> 
							<tbody id = "draft">
							 
							<?php if($expends_detail):?>
								<?php foreach($expends_detail as $det):?>
								
									<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>expense_detaiID" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][expense_detaiID]" value = "<?php echo $det['expense_detaiID'];?>">
									<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>deleted" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][deleted]" value = "0">
									<tr id = "<?php echo $det['expense_detaiID'];?>">
										<td>
										 
										<span id = "product_name<?php echo $det['expense_detaiID'];?>"> <?php echo $det['product_name'];?> </span>
										<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>product_ID" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][product_ID]" value = "<?php echo $det['product_ID'];?>">
										</td>
										<td> 
										<span id = "expense_note<?php echo $det['expense_detaiID'];?>"> <?php echo $det['expense_note'];?> </span>
										<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>expense_note" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][expense_note]" value = "<?php echo $det['expense_note'];?>">
										</td>
										<td> 
										<span id = "reference<?php echo $det['expense_detaiID'];?>"> <?php echo $det['reference'];?> </span>
										<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>reference" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][reference]" value = "<?php echo $det['reference'];?>">
										</td>
										<td style="text-align:right">
										<span id = "unit_price<?php echo $det['expense_detaiID'];?>"><?php echo number_format($det['unit_price'], 2,$currency_detail[0]['currency_format_decimal'], $currency_detail[0]['currency_format_separator']);?>
										  </span>
										<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>unit_price" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][unit_price]" value = "<?php echo $det['unit_price'];?>">
										</td>
										<td style="text-align:right">
										<span id = "quantity<?php echo $det['expense_detaiID'];?>"> <?php echo $det['quantity']* 1;?> </span>
										<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>quantity" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][quantity]" value = "<?php echo $det['quantity'];?>">
										</td>
										<td>
										<span id = "UoM<?php echo $det['expense_detaiID'];?>"><?php echo $det['uom'];?></span>
										<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>UoM" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][UoM]" value = "<?php echo $det['uom'];?>">
										</td>
										<td style="text-align:right">
										<span id="sub_total<?php echo $det['expense_detaiID'];?>"><?php echo number_format($det['sub_total'], 2,$currency_detail[0]['currency_format_decimal'], $currency_detail[0]['currency_format_separator']);?>
										</span>
										<input type = "hidden" id = "expends_detail<?php echo $det['expense_detaiID'];?>sub_total" name = "expends_detail[<?php echo $det['expense_detaiID'];?>][sub_total]" value = "<?php echo $det['sub_total'] * 1;?>">
										</td> 
										
										<td class="center">
												<div class="btn-toolbar row-action"> 
														<button class="btn btn-info" title="Edit" onclick="add_detail('<?php echo $det['expense_detaiID'];?>')" type="button" data-target="#myModal" data-toggle="modal"><i class="icon-edit"></i></button>
														<button class="delete btn btn-danger" title="Delete" onclick=delete_draft("<?php echo $det['expense_detaiID'];?>")><i class="icon-trash "></i></button> 
												</div>
										 </td>
									</tr> 
								<?php endforeach;?>
							<?php endif;?>
								 	 
							</tbody> 
						</table> 
					</div> 
				</div>
				 
		</div>							  
	 
		<div id="bc1" class="col-md-6 btn-group btn-breadcrumb"> 
		
			<?php if(!$expends_data):?>
			<a href="#" class="btn btn-success"><div>New</div></a>
			<a href="#" class="btn btn-default"><div>Awaiting Approval</div></a>
			<a href="#" class="btn btn-default"><div>Approved</div></a>
			<a href="#" class="btn btn-default"><div>Invoice</div></a> 
			<?php endif;?>
			
			<?php if($expends_data[0]['state']=="Approved"):?>
			<a href="#" class="btn btn-default"><div>New</div></a>
			<a href="#" class="btn btn-default"><div>Awaiting Approval</div></a>
			<a href="#" class="btn btn-success"><div>Approved</div></a>
			<a href="#" class="btn btn-default" onclick = "expense_state('<?php echo $expends_data[0]['expense_ID'];?>')"><div><i class = "icon-print"></i> Print Invoice</div></a> 
			<?php endif;?>
			
			<?php if($expends_data[0]['state']=="Invoiced"):?>
			<a href="#" class="btn btn-default"><div>New</div></a>
			<a href="#" class="btn btn-default"><div>Awaiting Approval</div></a>
			<a href="#" class="btn btn-default"><div>Approved</div></a>
			<a href="#" class="btn btn-success"><div><i class = "icon-print"></i> Print Invoice</div></a>  
			<?php endif;?>
			
			<?php if($expends_data[0]['state']=="Refused"):?>
			<a href="#" class="btn btn-default"><div>New</div></a>
			<a href="#" class="btn btn-default"><div>Awaiting Approval</div></a>
			<a href="#" class="btn btn-danger"><div>Refused</div></a>
			<a href="#" class="btn btn-default"><div>Invoice</div></a> 
			<?php endif;?>
			
			<?php if($expends_data[0]['state']=="Awaiting Approval"):?>
			<a href="#" class="btn btn-default"><div>New</div></a>
			<a href="#" class="btn btn-success"><div>Awaiting Approval</div></a>
			<a href="#" class="btn btn-default"><div>Approved</div></a>
			<a href="#" class="btn btn-default"><div>Invoice</div></a> 
			<?php endif;?>
		</div>
		
		

		<div id="bc1" class="col-md-6 btn-group btn-breadcrumb"> 
		<button class="btn btn-default  icon-ok" type = "submit" > Submit to Manager</button> 
		</div>
		
</form>	
		 
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

<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">
 
<script>		 
 
			var a = $('select#department_ID option:selected').val();
			  
			if(a!=''){
			
			get_project(); 
			get_task(); 
			}
			
			function get_task(){
							
				var project_IDx = $('select#project_IDx option:selected').val();
				
				if(project_IDx == ""){
				var project_IDx = "<?php echo $expends_data[0]['project_ID'];?>";
				}
				
				var task_ID = "<?php echo $expends_data[0]['task_ID'];?>";
				 
				$.ajax({
					
					url: "<?php echo base_url('hrd/get_task_detail/');?>" + '/' +project_IDx,
					 
					success: function (data) {
					
					
					$( "#task_IDx" ).html("<option value = ''>-- Choose Task --</option>");
					var jsonData = JSON.parse(data);
					 
						optmin = "<option value = ''>-- Choose Task --</option>";
						for (var i = '0'; i < jsonData.tasknya.length; i++) {
							var datanya = jsonData.tasknya[i];
							
							if(datanya.task_ID > '0'){
									if(datanya.task_ID == task_ID){
									optmin += "<option value ='"+ datanya.task_ID +"' selected>"+ datanya.task_name +"</option>";
									}else{
									optmin += "<option value ='"+ datanya.task_ID +"'>"+ datanya.task_name +"</option>";
									}
							}
													
							$( "#task_IDx" ).html(optmin); 
						}
						
					}
				});
					
			}
			 			
			function  get_project(){
			
					if($('#department_ID').val()!='-1'){
					var depID = $('#department_ID').val();
					}else{
					var depID = null;
					}
						 
					$.ajax({
						
						url: "<?php echo base_url('hrd/get_project_detail/');?>" +'/'+ depID,
						
						
						success: function (data) {
						$( "#project_IDx" ).html("<option value = ''>-- Choose Project --</option>");
						var jsonData = JSON.parse(data); 
							optmin = "<option value = ''>-- Choose Project --</option>";
							
							var idselect = "<?php echo $expends_data[0]['project_ID'];?>";
							 
							for (var i = 0; i < jsonData.projectnya.length; i++) {
							
										var datanya = jsonData.projectnya[i];
										
										if(datanya.project_ID == idselect){
										optmin += "<option value ='"+ datanya.project_ID +"'selected >"+ datanya.project_name +"</option>";
										}else{
										optmin += "<option value ='"+ datanya.project_ID +"'>"+ datanya.project_name +"</option>";
										}
										  
										
										  
										$( "#project_IDx" ).html(optmin); 
							}
							
						}
					});
					
				};
			 
</script> 
<script>

	$('#validate_error').val('0'); //wawan 

	document.getElementById('employee').focus(); 	
	
	function expense_state(a){ 
		 $.ajax({
				 url: "<?php echo base_url('hrd/expense_state/');?>"+"/"+a,
				success: function(data){       	 
				
				}  
		 
		 })
	}

	function what_next_currency(){
					get_currency();
	}
	 
	 function add_detail(a){
		 $.ajax({
				 url: "<?php echo base_url('hrd/expends_detail_add/');?>"+"/"+a,
				success: function(data){      
				$( "#modal_body" ).html(data); 		
				$( "#modal_label" ).html("Expense Lines"); 		 
				}  
		 
		 })
	 }

load_data();
function load_data(){

	$.ajax({
	
		url:"<?php echo base_url('hrd/expends_detail_data');?>",
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
 
$('#date').datepicker({
  format:"dd-mm-yyyy"
});  

function delete_draft(a){
		
		$("#expends_detail"+a+"deleted").val('1');		
		$("#"+a).remove();
					 
}

cek_validate();
			function cek_validate(){
				
				 var container = $('div.error-container ');
                // validate the form when it is submitted
                var validator = $(".form-validate").validate({
                    errorContainer: container,
                    errorLabelContainer: $("ol", container),
                    wrapper: 'span',
                    meta: "validate"
                });
				
                $(".cancel").click(function () {
                    validator.resetForm();
                });
			} 
			

$("form#form-expends").submit(function(e){

	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
			NProgress.inc();	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/expends_add_action');?>",
				data: $("#form-expends").serialize(),
				success: function(data)
				{ 
					NProgress.done(true);
					display_data();
				}
			});
			
			return false;
	});
	
		

	 function add_currency(){
		 $.ajax({
				 url: "<?php echo base_url('hrd/currency_add/');?>",
				success: function(data){      
				$( "#modal_body" ).html(data); 		 
				$( "#modal_label" ).html("Add Currency"); 	
				}  
		 
		 })
	 }
	 
		 
	$( "select#department_ID" ).change(function() {
	 
			var a = $('select#department_ID option:selected').val();
			
			$.ajax({
				
				url: "<?php echo base_url('hrd/get_project_detail/');?>" + '/' +a,
				 
				success: function (data) {
				 
				$( "#project_IDx" ).html("<option value = ''>-- Choose Project --</option>");
				
				$( "#task_IDx" ).html("<option value = ''>-- Choose Task --</option>");
				
				var jsonData = JSON.parse(data);
				 
					optmin = "<option value = ''>-- Choose Project --</option>";
					for (var i = '0'; i < jsonData.projectnya.length; i++) {
						var datanya = jsonData.projectnya[i];
							
								optmin += "<option value ='"+ datanya.project_ID +"'>"+ datanya.project_name +"</option>";
											
						$( "#project_IDx" ).html(optmin); 
					}
					
				}
			});
			
		});
		
		
		
		$( "select#project_IDx" ).change(function() {

		get_task();
			
		});
		
		function get_task(){
							
				var project_IDx = $('select#project_IDx option:selected').val();
				
				if(project_IDx == ""){
				var project_IDx = "<?php echo $expends_data[0]['project_ID'];?>";
				}
				
				var task_ID = "<?php echo $expends_data[0]['task_ID'];?>";
				 
				$.ajax({
					
					url: "<?php echo base_url('hrd/get_task_detail/');?>" + '/' +project_IDx,
					 
					success: function (data) {
					
					
					$( "#task_IDx" ).html("<option value = ''>-- Choose Task --</option>");
					var jsonData = JSON.parse(data);
					 
						optmin = "<option value = ''>-- Choose Task --</option>";
						for (var i = '0'; i < jsonData.tasknya.length; i++) {
							var datanya = jsonData.tasknya[i];
							
							if(datanya.task_ID > '0'){
									if(datanya.task_ID == task_ID){
									optmin += "<option value ='"+ datanya.task_ID +"' selected>"+ datanya.task_name +"</option>";
									}else{
									optmin += "<option value ='"+ datanya.task_ID +"'>"+ datanya.task_name +"</option>";
									}
							}
													
							$( "#task_IDx" ).html(optmin); 
						}
						
					}
				});
					
			}
	 
	 	function  get_currency(){
						 
					$.ajax({
						
						url: "<?php echo base_url('hrd/get_currency/');?>",
						
						
						success: function (data) {
						 
						var jsonData = JSON.parse(data); 
							optmin = "";
							for (var i = 0; i < jsonData.currencynya.length; i++) {
							
										var datanya = jsonData.currencynya[i];
										  
										optmin += "<option value ='"+ datanya.currency_ID +"'>"+ datanya.currency_name +"</option>";
										 
										$( "#currency_ID" ).html(optmin); 
							}
							
						}
					});
					
				};
				
		
 
 function add_project(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/project_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Project"); 		 
			}  
	 
	 })
 }
 
 function add_task(){
 
	if($('#project_IDx').val()== ''){ 
		$( "#modal_body" ).html('<div class="alert alert-warning" role="alert">Choose Project first !</div>'); 		
		$( "#modal_label" ).html("Add Task"); 		
	
	}else{
 
		 $.ajax({
				 url: "<?php echo base_url('hrd/task_add_direct/');?>" +'/'+ $('#project_IDx').val(),
				success: function(data){      
				$( "#modal_body" ).html(data); 		
				$( "#modal_label" ).html("Add Task"); 		 
				}  
		 
		 })
	 
	 }
 }
 
 function add_department(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/department_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Department"); 		 
			}  
	 
	 })
 }		
 </script>
 


