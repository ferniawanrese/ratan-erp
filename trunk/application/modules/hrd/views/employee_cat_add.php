<form  id = "catAdd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
							 
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Employee Parent Category:</label>
							<div class="control col-md-4">
								<input name="parent_new"  id = "parent_new" class="form-control " type="text" placeholder = "New Parent"  style ="display:none"/>
								 
								<select class = "form-control" id = "parent" name = "parent"> 
									<?php foreach ($parent as $parents):?>
									<option value="<?php echo $parents['employee_catID'];?>"><?php echo $parents['employee_catName'];?></option>
									<?php endforeach;?>
									<option value="-1">+ Add New Parent</option>
								</select>
							</div>
						</div> 
						<div class="form-group">
							<label  class="col-sm-3 control-label"> Employee Child Category:</label>
							<div class="control col-md-4">
								<input name="child"  id = "child" class="form-control " type="text"    /> 
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
	$('#parent').on('change', function() {
	  var a= this.value;
	  if(a !=-1){
	   //  $('#parent_new').attr("disabled", true);
	  $('#parent_new').hide();
	  }else{
	  $('#parent_new').show(); 
	  }
	});
  
	$("form#catAdd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/employee_cat_add_action/');?>",
				data: $("#catAdd").serialize(),
				success: function(data)
				{
					display_data();
					$('#myModal').modal('hide');
				}
			});
			
			return false;
	});
</script>