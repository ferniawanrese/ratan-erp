<form  id = "compadd" class="form-horizontal form-validate" enctype="multipart/form-data" action ="<?php echo base_url('hrd/department_add_action/');?>" method="post">
						<input name="company_ID"  id = "company_ID" class="form-control " type="hidden"  value="<?php echo $companies[0]['company_ID'];?>"  /> 
						<div class="form-group">
							<label  class="col-sm-3 control-label">Company Name :</label>
							<div class="control col-md-4">
								<input name="company_name"  id = "company_name" class="form-control " type="text"  value="<?php echo $companies[0]['company_name'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Address :</label>
							<div class="control col-md-4">
								<textarea name="address"  id = "address" class="form-control "   ><?php echo $companies[0]['address'];?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Found Year :</label>
							<div class="control col-md-4">
								<input name="found_year"  id = "found_year" class="form-control " type="text"   value = "<?php echo $companies[0]['found_year'];?>" /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Website :</label>
							<div class="control col-md-4">
								<input name="website"  id = "website" class="form-control " type="text"  value = "<?php echo $companies[0]['website'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Phone :</label>
							<div class="control col-md-4">
								<input name="phone"  id = "phone" class="form-control " type="text"  value = "<?php echo $companies[0]['phone'];?>"  /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Owner :</label>
							<div class="control col-md-4">
								<input id = "employee_IDx" name="employee_IDx" class="form-control employee_IDx" type="text" 
								value = "<?php echo $companies[0]['employee_name'];?><?php if(isset($companies[0]['employee_badge'])){echo "/";};?><?php echo $companies[0]['employee_badge'];?>"/>
								<input name="employee_ID"  id = "employee_ID" class="form-control " type="hidden"    /> 
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label">Badge Code:</label>
							<div class="control col-md-4">
								<input name="badge"  id = "badge" class="form-control " type="text"   placeholder = "ex: ASR-" value = "<?php echo $companies[0]['badge'];?>"/> 
							</div>
						</div>
						
						<div class="form-group"> 
							<label  class="col-sm-3 control-label">Leading Zeros :</label>
							<div class="control col-md-4">
								<div class="input-group number-spinner">
									<span class="input-group-btn data-down ">
										<button type="button"  class="btn btn-default btn-info" data-dir="dwn" ><i class="glyphicon glyphicon-minus"></i></button>
									</span>
									<input type="text" id = "badge_leadingzeros" name = "badge_leadingzeros" class="form-control text-center"   min="0" max="100000" title="Initial Increment" 
									value = "<?php if(isset($companies[0]['badge_leadingzeros'])){ echo $companies[0]['badge_leadingzeros'];}else{echo "1";};?>">
									<span class="input-group-btn data-up ">
										<button type="button"  class="btn btn-default btn-info "  data-dir="up" ><i class="glyphicon glyphicon-plus"></i></button>
									</span>
								</div>
							</div>
						</div>
						
						<div class="form-group"> 
							<label  class="col-sm-3 control-label">Initial Badge Increment :</label>
							<div class="control col-md-4">
								<div class="input-group number-spinner">
									<span class="input-group-btn data-down ">
										<button type="button"  class="btn btn-default btn-info" data-dir="dwn" ><i class="glyphicon glyphicon-minus"></i></button>
									</span>
									<input type="text" id = "badge_inc" name = "badge_inc" class="form-control text-center"   min="0" max="100000" title="Initial Increment" 
									value = "<?php if(isset($companies[0]['badge_inc'])){ echo $companies[0]['badge_inc'];}else{echo "1";};?>">
									<span class="input-group-btn data-up ">
										<button type="button"  class="btn btn-default btn-info "  data-dir="up" ><i class="glyphicon glyphicon-plus"></i></button>
									</span>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-sm-3 control-label"> </label>
							<div class="control col-md-4">
								<button class="alert-box btn" type = "submit" >Finish</button>
							</div> 
						</div>
						
						
</form>


<style>
   
@media ( max-width: 585px ) {
    .input-group span.input-group-btn,.input-group input,.input-group button{
        display: block;
        width: 100%;
        border-radius: 0;
        margin: 0;
    }
    .input-group {
        position: relative;   
    }
    .input-group span.data-up{
        position: absolute;
        top: 0;
    }
    .input-group span.data-dwn{
        position: absolute;
        bottom: 0;
    }
    .form-control.text-center {
        margin: 34px 0;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group{
        margin-left:0;
    }

}

</style>	


<script>
$(function() {
    var action;
    $(".number-spinner button").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
}); 

$("form#compadd").submit(function(e){
	
	e.preventDefault();
	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('backend/company_add_action/');?>",
				data: $("#compadd").serialize(),
				success: function(data)
				{ 

					$('#myModal').modal('hide'); 
					what_next(); 
				}
			});
			
			return false;
	});
	
	$(function() {
		$( ".employee_IDx" ).autocomplete({ 
		 
			source: "<?php echo base_url('hrd/get_employee_name/');?>" + "/" + $('.employee_managerName_dep').val(),
				select: function (event, ui) {
				var id = ui.item.employee_ID; 
				$("#employee_ID").val(id); 
				}  
				
		}); 
	}); 
</script>