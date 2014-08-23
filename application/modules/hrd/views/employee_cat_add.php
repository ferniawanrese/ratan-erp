<form  class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/employee_cat_add_action/');?>" method="post">
							 
						 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Parent :</label>
							<div class="control col-md-4">
								<input name="parent_new"  id = "parent_new" class="form-control " type="text" placeholder = "New Parent"  />
								 
								<select class = "form-control" id = "parent" name = "parent">
									<option value="-1">--Choose Parent--</option>
								<?php foreach ($parent as $parents):?>
									<option value="<?php echo $parents['employee_catID'];?>"><?php echo $parents['employee_catName'];?></option>
								<?php endforeach;?>
								</select>
						</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Child :</label>
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
  $('#parent_new').attr("disabled", true);
  }else{
  $('#parent_new').attr("disabled", false);
  }
});
</script>