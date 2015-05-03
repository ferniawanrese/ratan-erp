	<form  id = "form_asset" class="form-horizontal form-validate" enctype="multipart/form-data" method="post">
			<input name="asset_ID"  id = "asset_ID"   name = "asset_ID" type="hidden" value = "<?php echo $asset[0]['asset_ID'];?>"   />				  
			<div class="form-group">
				<label  class="col-sm-3 control-label">Asset Name :</label>
				<div class="control col-md-4">
					<input name="asset_name"  id = "asset_name" class="form-control " type="text" value = "<?php echo $asset[0]['asset_name'];?>"/> 
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Barcode :</label>
				<div class="control col-md-4"> 
					<input   id = "product_code" class="form-control product_code {validate:{required:true}}" type="text"   placeholder = "Scan Barcode"  value = "<?php echo $asset[0]['product_code'];?>"/> 
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Product :</label>
				<div class="control col-md-4">
					<span class = "input-group  "> 
					<input  id = "product" class="form-control product {validate:{required:true}}" type="text"   value = "<?php echo $asset[0]['product_name'];?>"  /> 
					<input id = "product_ID" name="product_ID"  class = "product_ID" type="hidden" value = "<?php echo $asset[0]['product_ID'];?>" /> 
					<span class="input-group-addon "> 
						<i class="icon-plus " onclick="add_product()" data-target="#myModal" data-toggle="modal" title="Add Product" style="cursor:pointer;"></i>
					</span>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Asset Code :</label>
				<div class="control col-md-4">
					<input name="asset_code"  id = "asset_code" class="form-control " type="text" value = "<?php echo $asset[0]['asset_code'];?>"/> 
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Asset Group :</label>
				<div class="control col-md-4">
					<span class = "input-group  "> 
					<select class = "form-control" name = "asset_groupID" id = "asset_groupID">
					<?php foreach($asset_group as $group):?> 
						<?php if($asset[0]['asset_groupID'] == $group['asset_groupID']){$selected = "selected";}else{$selected = "";};?>
						<option value = "<?php echo  $group['asset_groupID'];?>" <?php echo $selected;?>><?php echo  $group['group_name'];?></option> 
					<?php endforeach;?>	
					</select>					
					<span class="input-group-addon "> 
						<i class="icon-plus " onclick="add_group()" data-target="#myModal" data-toggle="modal" title="Add State" style="cursor:pointer;"></i>
					</span>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Asset State :</label>
				<div class="control col-md-4">
					<span class = "input-group  "> 
					<select class = "form-control" name = "asset_stateID" id = "asset_stateID">
					<?php foreach($asset_state as $state):?> 
						<?php if($asset[0]['asset_stateID'] == $state['asset_stateID']){$selected = "selected";}else{$selected = "";};?>
						<option value = "<?php echo  $state['asset_stateID'];?>" <?php echo $selected;?>><?php echo  $state['state_name'];?></option> 
					<?php endforeach;?>	 
					</select>
					<span class="input-group-addon "> 
						<i class="icon-plus " onclick="add_state()" data-target="#myModal" data-toggle="modal" title="Add State" style="cursor:pointer;"></i>
					</span>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Department :</label>
				<div class="control col-md-4">
					<span class = "input-group  "> 
					<select class = "form-control" id = "department_ID" name = "department_ID">
								<option value = "-1">-- Choose Department --</option>
						<?php foreach($department_data as $dep):?>
							<?php if($dep['department_ID'] == $asset[0]['department_ID'] ){$selected= "selected";}else{$selected="";};?>
							<?php if($dep['department_parentID'] == '0'):?>
								<option value = "<?php echo  $dep['department_ID'];?>" <?php echo $selected;?>><?php echo  $dep['department_name'];?></option>
							<?php else:?>
								<option value="<?php echo  $dep['department_ID'];?>" <?php echo $selected;?>><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
							<?php endif;?>										
						<?php endforeach;?>	 
					 </select>
					<span class="input-group-addon "> 
						<i class="icon-plus " onclick="add_department()" data-target="#myModal" data-toggle="modal" title="Add State" style="cursor:pointer;"></i>
					</span>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Employee :</label>
				<div class="control col-md-4">
					<input    id = "employee" class="form-control employee {validate:{required:true}}" type="text"  value = "<?php if($asset[0]['employee_name']){echo $asset[0]['employee_name']."/".$asset[0]['employee_badge'];};?>"  /> 
					<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"  value = "<?php echo $asset[0]['employee_ID'];?>"   />
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Location  :</label>
				<div class="control col-md-4">
					<input name="location"  id = "location" class="form-control " type="text" value = "<?php echo $asset[0]['location'];?>"/> 
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-3 control-label">Note  :</label>
				<div class="control col-md-4">
					<textarea class = "form-control" id = "note" name = "note"><?php echo $asset[0]['note'];?></textarea>
				</div>
			</div>
			  
			<div class="form-group">
				<label  class="col-sm-3 control-label"> </label>
				<div class="control col-md-4">
					<button class="alert-box btn" type = "submit" >Finish</button>
				</div> 
			</div>
						
</form>

<script>
$("#product_code").focusout(function() {
	
		var barcode = $("#product_code").val();
		$.ajax({
				 url: "<?php echo base_url('hrd/barcode_check/');?>"+"/"+barcode,
				success: function(data){  

					var jsonData = JSON.parse(data);  
					$.each(jsonData.barcode_check, function(i, v) {

							var datanya = jsonData.barcode_check[i]; 
							$('#product').val(datanya.product_name);
							$('#product_ID').val(datanya.product_ID);
                    });
				  	
				}  
		 
		 }) 
	 }) 
	 
	 
$(function() {
		$( ".product" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_product_name/');?>" + "/" + $('.product').val(),
				select: function (event, ui) {
				var id = ui.item.product_ID; 
				var barcode = ui.item.barcode; 
				$(".product_ID").val(id); 
				$(".product_code").val(barcode); 
				}  
				
		}); 
}); 

$("form#form_asset").submit(function(e){
	
	if($('#validate_error').val()==1){
		return false;
	}
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('asset/asset_add_action/');?>",
				data: $("#form_asset").serialize(),
				success: function(data)
				{
					
					 display_data();
					
				}
			});
			
			return false;
	});
	
	$(function() {
		$( ".employee" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID;
				$("#employee_ID").val(id);
				}  
		}); 
	}); 
	
	function add_department(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/department_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Department"); 		 
			}  
	 
	 })
	 }
	 
	 function add_state(){
	 $.ajax({
			 url: "<?php echo base_url('asset/asset_state_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Asset State"); 		 
			}  
	 
	 })
	 }
	 
	 function add_group(){
	 $.ajax({
			 url: "<?php echo base_url('asset/asset_group_add/');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Asset Group"); 		 
			}  
	 
	 })
	 }
	 
	 function add_product(){
	 $.ajax({
			 url: "<?php echo base_url('hrd/product_add');?>",
			success: function(data){      
			$( "#modal_body" ).html(data); 		
			$( "#modal_label" ).html("Add Product"); 		 
			}  
	 
	 })
	 }
</script>