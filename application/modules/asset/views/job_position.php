<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Job Positions</li>	
</ul>

<div class="primary-head">
		<!--content-->
		<div class="row-fluid">
					<div class="content-widgets gray">
						<div class="widget-head blue clearfix">
						  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Job Positions Data </h3>							
						</div>
															
						<div class="well col-sm-12 col-md-12">
						<form id = "form_filter"  method="post">
							<div class = "col-md-3 btn-create">
								<input type ="text" name ="search" id="search" class="form-control" placeholder="Job Name">
							</div>
							<div class = "col-md-3 btn-create">
								 <select class = "form-control" id = "department_ID" name = "department_ID">
											<option value = "">-- Choose Department --</option>
									<?php foreach($department_data as $dep):?>
										<?php if($dep['department_parentID'] == '0'):?>
											<option value = "<?php echo  $dep['department_ID'];?>"><?php echo  $dep['department_name'];?></option>
										<?php else:?>
											<option value="<?php echo  $dep['department_ID'];?>"><?php echo $depparent[$dep['department_parentID']].'/'.$dep['department_name'];?></option>
										<?php endif;?>										
									<?php endforeach;?>	 
								 </select>
							</div>
							<div class = "btn-create form-group"> 
								<button class="btn btn-default btn-large  " type="button" onclick = "display_data()"> Seacrh!</button>
								<button class="btn btn-default btn-large  " type="button" onclick = "clean()"> Clean</button>
							</div>
						</form>	
							<div class = "col-md-3 btn-create form-group "  >
							 <button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "job_position_add()"  > Create</button>
							</div>
							<div   id = "btn-list" class="form-group">
								<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
							</div>
							<div class = "list col-sm-12 col-md-12">
								<!-- content ajax -->											
							</div>
							
						</div> 
					</div>
		</div>
</div>		


<script>
function what_next2(){

display_data();
}

display_data();

function display_data(){ 
	$('#btn-list').hide();
	$('.btn-create').show();
	NProgress.inc();	
	$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/job_position_data/');?>",
				data: $("#form_filter").serialize(),
				success: function(data){     
					$( ".list" ).html(data); 								
					NProgress.done(true);
				}			
			});

}

function clean(){
$("#search").val("");
$("#department_ID").val("");
display_data();
}

function job_position_add(){
    NProgress.inc();	
	$('#btn-list').show();
	$('.btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/job_position_add/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}


function job_position_update(a){
	NProgress.inc();	
	$('#btn-list').show();
	$('.btn-create').hide();
	$.ajax({
				
				url: "<?php echo base_url('hrd/job_position_add/');?>" +"/"+ a,
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}


function delete_post(a){
	
	bootbox.confirm("Are you sure?", function (result) {
                  
					if(result == true){						
						$.ajax({
									url: "<?php echo base_url('hrd/job_position_deleted/')?>/" + a,									
									success: function(data)
									{											
											display_data();
									}
						});
					}
					
                });
}
</script>	