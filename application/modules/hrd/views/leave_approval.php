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
						<form id = "form_filter"  method="post">
							<div class = "col-md-3 btn-create">
								<input type ="text" name ="search" id="search" class="form-control" placeholder="Employee Name">
							</div> 
							<div class = "btn-create form-group"> 
								<button class="btn btn-default btn-large  " type="button" onclick = "display_data()"> Seacrh!</button>
								<button class="btn btn-default btn-large  " type="button" onclick = "clean()"> Clean</button>
							</div>
						</form>	
							<div class = "col-md-3 btn-create form-group "  >
							 <button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "leave_add()"  > Create</button>
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

	display_data();
	function display_data(){ 
		$('#btn-list').hide();
		$('.btn-create').show();
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


	function clean(){
	$("#search").val(""); 
	display_data();
	}

	function leave_add(a){
	 
		$('#btn-list').show();
		$('.btn-create').hide();
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
</script>