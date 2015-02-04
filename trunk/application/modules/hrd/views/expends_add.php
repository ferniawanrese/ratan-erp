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
							<input name="employee"  id = "employee" class="form-control employee {validate:{required:true}}" type="text"    /> 
							<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"    />
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
							<span class = "input-group  "> 
								<select class = "form-control" name = "currency_ID" id = "currency_ID">
									<?php foreach($currency as $cur):?>
									<option value = "<?php echo $cur['currency_ID'];?>"><?php echo $cur['currency_code'];?></option> 
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
								<input  type="text" class = "form-control datepicker {validate:{required:true}}" id = "date" name = "date" value = "">
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
								 	 
							</tbody> 
						</table> 
					</div> 
				</div>
				 
		</div>							  
	 
		<div id="bc1" class="col-md-6 btn-group btn-breadcrumb"> 
			<a href="#" class="btn btn-success"><div>New</div></a>
			<a href="#" class="btn btn-default"><div>Awaiting Approval</div></a>
			<a href="#" class="btn btn-default"><div>Approved</div></a>
			<a href="#" class="btn btn-default"><div>Invoice</div></a> 
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

	$("#"+a).remove();

}


$("form#form-expends").submit(function(e){
	
	//e.preventDefault();
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
</script>


