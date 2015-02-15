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
										  
											<div class = "list col-sm-12 col-md-12">
												<span id='calendar'>
											    </span>
												<!-- content ajax -->	 
											</div>
										 
										</div> 
									</div>
						</div>
</div>	
			
<!-- dialog contents on hidden div -->   
 
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

function what_next_leave_add(){

}
  
</script>

<script> 
//* calendar
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
			 
				aspectRatio: 2,
				selectable: true,
				selectHelper: true,
				select: function(start, end, allDay, date) {
				var eventTime = $.fullCalendar.formatDate(start, "yyyy-MM-dd");
				
					$.ajax({
						url: "<?php echo base_url('hrd/leaves_add/');?>" + '/' + eventTime,
						success: function(data){ 
							$("#modal_label").html("Add Leave");
							$( "#modal_body" ).html(data);  
						}  
					});
					
					$('#myModal').modal({
						show: 'true'
					}); 
										
					//calendar.fullCalendar('unselect');
				},
				editable: true,
				theme: false,
				events: {
				cache: false,
				url:'<?php echo base_url('hrd/leaves_calendar_json');?>',
				//cache: false
				},
				eventRender: function(event, element) {                                          
					element.find('span.fc-event-title').html(element.find('span.fc-event-title').text());					  
				},
				eventColor: '',
				lazyFetching:false
				
			})
			 NProgress.done(true);
</script>