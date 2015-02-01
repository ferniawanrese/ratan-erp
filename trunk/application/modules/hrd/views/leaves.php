<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Leaves</li> 
</ul>

    <link href="<?php echo base_url('css/fullcalendar.css');?>" rel="stylesheet">
    <script src="<?php echo base_url('js/fullcalendar.min.js');?>"></script>


<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;"> Leaves Calendar</h3> 
										</div> 		
										
										<div class="well col-sm-12 col-md-12">
										
											<div  id = "btn-create" class="form-group">
												<button class="btn btn-inverse btn-large icon-plus" type="button" onclick = "add_leaves()"> Create</button>
												<!--<button class="btn btn-inverse btn-large icon-file-alt" type="button" onclick = "exportdata()"> Export to Excel</button>-->
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "open_filter()" id = "Show"> Show Filter</button>
												<button class="btn btn-inverse btn-large icon-filter" type="button" onclick = "close_filter()" id = "Hide" style = "display: none;"> Hide Filter</button>
											</div>
											
											<div   id = "btn-list" class="form-group" style = "display: none;">
												<button class="btn btn-inverse  icon-arrow-left" type="button" onclick = "display_data()" > Back to Data</button>
											</div>
											 
											<span  id ="search" style = "display: none;">	
												<!-- searching -->
												<form id = "form_filter" name="form_filter" method="post">
													
													<fieldset class="default panel">
													<legend> Filtering </legend>
													
													<div class="form-group col-sm-12 col-md-3">
														<label for="validate-text"></label>
														<div class="input-group col-sm-12 col-md-12">
															<input type="text" class="form-control" id="employee_name" name="filter[employee_name]" placeholder="employee name" >	 
														</div>
													</div>
													</fieldset>
													
												</form>
											</span>
											 
											<div class = "list col-sm-12 col-md-12">
												<span id='calendar'>
											    </span>
												<!-- content ajax -->	 
											</div>
										 
										</div> 
									</div>
						</div>
</div>	
 
<script>

function close_filter(){											
$("#search").fadeOut();
$("#Show").show();
$("#Hide").hide();
}
function open_filter(){											
$("#search").fadeIn();
$("#Hide").show();
$("#Show").hide();
}


function add_leaves(){

	$('#search').hide();
	$('#btn-list').show();
	$('#btn-create').hide();
	NProgress.inc();
	$.ajax({
				
				url: "<?php echo base_url('hrd/add_leaves/');?>",
				success: function(data){     

					$( ".list" ).html(data); 		
					NProgress.done(true);
				}  
			});

}

display_data();
function display_data(){

	NProgress.inc();
	 var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    $('#calendar').fullCalendar({
    header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
    },
    buttonText: {
    prev: 'Prev',
    next: 'Next',
    today: 'Today',
    month: 'Month',
    week: 'Week',
    day: 'Day'
    },
    editable: true,
    events: [{
    title: 'All Day Event',
    start: new Date(y, m, 1)
    }, {
    title: 'Long Event',
    start: new Date(y, m, d - 5),
    end: new Date(y, m, d - 2)
    }, {
    id: 999,
    title: 'Repeating Event',
    start: new Date(y, m, d - 3, 16, 0),
    allDay: false
    }, {
    id: 999,
    title: 'Repeating Event',
    start: new Date(y, m, d + 4, 16, 0),
    allDay: false
    }, {
    title: 'Meeting',
    start: new Date(y, m, d, 10, 30),
    allDay: false
    }, {
    title: 'Lunch',
    start: new Date(y, m, d, 12, 0),
    end: new Date(y, m, d, 14, 0),
    allDay: false
    }, {
    title: 'Birthday Party',
    start: new Date(y, m, d + 1, 19, 0),
    end: new Date(y, m, d + 1, 22, 30),
    allDay: false
    }, {
    title: 'Click for Google',
    start: new Date(y, m, 28),
    end: new Date(y, m, 29),
    url: 'http://google.com/'
    }]
    });
	
}
</script>