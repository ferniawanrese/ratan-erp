<?php $this->load->view('header'); ?>

<div class="container-fluid" tabindex="1" onkeypress = "TriggeredKey(event)">
	<div class="row-fluid">
		<div class="span12">
		
			<!-- main menu -->
			<?php $this->load->view('menu'); ?>
			<!-- end main menu -->
			
			<!-- breadcrumb -->
			<span id = "breadcrumb"></span>
			<!-- end breadcrumb -->
			
			<!-- alert -->
			<span id = "alert"></span>
			<!-- end alert -->
			
			<div class="container-fluid">
			<div class="row-fluid">
				
			<!--Sidebar content left menu-->
			<div class="span2" >
					<div class="accordion" id="left_menu"></div>
			</div>
			<!--end left content menu-->
	
			<!--Body Center Content-->
			<div class="span7" id = "contentbarid">
			
					<!-- show search -->
						<div class="span12 navbar">
							<div class="navbar-inner">
								<div class="container">
									<ul class="nav pull-left">
									  <li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Field <b class="caret"></b></a>
										<ul class="dropdown-menu">
										  <li><a href="#">First Name</a></li>
										  <li><a href="#">Last Name</a></li>
										  <li><a href="#">Start Date</a></li>
										</ul>
									  </li>
									</ul>
									<span class="navbar-search" action = "">
										<div class="input-append">
											<input type="text" class="search-query span12" placeholder="Search&hellip;" id = "searching" name="searching" value = "">
											<span class="fornav"><i class="icon-search"></i></span>
										</div>
									</span>
								</div>
							</div>
						</div>		
						
						<div class= "span12">
									 <div class="input-prepend">
										<span class="add-on"><label>Tabel Employee</label></span>
										<span class="add-on"><i class="glyphicon glyphicon-calendar icon-calendar"></i></span><input type="text" style="width: 160px" name="reservation" id="reservation" value="03/18/2013 - 03/23/2013" />
									 </div>
						</div>
					<!-- end search -->
					
					<!-- show table-->	
						<div class="span12 achievements-wrapper" id="overscroll"></div>		
					<!-- end table -->	
						
			</div>
			<!--end Body Center Content-->
			
			<!-- tabs_right -->
			<div class="span3" id = "sidebarid">
			<a href="#" id="hideSpan"><i class = "icon-circle-arrow-right"></i></a>		
			<script>
				$('#hideSpan').click(function() {
				$('#sidebarid').hide(200);
				$('#contentbarid').animate({width: '1000%'}, 200);
				});
			</script>
				<div class="tabbable" id="tabs_right">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#panel-443663" data-toggle="tab">Companies</a>
						</li>
						<li>
							<a href="#panel-93130" data-toggle="tab">Histories</a>
						</li>
						<li>
							<a href="#panel-93131" data-toggle="tab">Report</a>
						</li>
					</ul>
					<div class="tab-content" id = "tab-content"></div>
				</div>
			</div>
			<!-- end tab right -->
			
			</div>
			</div>
		</div>
	</div>
</div>

<script>
function TriggeredKey(e) {
	if(e.keyCode==113){
		$("#myModal").modal({ // wire up the actual modal functionality and show the dialog
		"backdrop" : "static",
		"keyboard" : true,
		"show" : true // ensure the modal is shown immediately
		});
	};
}


all();
function all(){
$.ajax({
	url: "<?php echo base_url('').'demo/breadcrumb';?>",
	success: function(data){   
		$( "#breadcrumb" ).html(data); 
	}  
});

$.ajax({
	url: "<?php echo base_url('').'demo/left_menu';?>",
	success: function(data){   
		$( "#left_menu" ).html(data); 
	}  
});

$.ajax({
	url: "<?php echo base_url('').'demo/alert';?>",
	success: function(data){   
		$( "#alert" ).html(data); 
	}  
});

$.ajax({
	url: "<?php echo base_url('').'demo/data';?>",
	success: function(data){   
		$( "#overscroll" ).html(data); 
	}  
});

$.ajax({
	url: "<?php echo base_url('').'demo/tabs_right';?>",
	success: function(data){   
		$( "#tab-content" ).html(data); 
	}  
});
}


</script>

<?php $this->load->view('footer'); ?>
