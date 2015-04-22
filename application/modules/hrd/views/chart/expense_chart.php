<div class="row-fluid">
	<div class="col-md-12">
		<fieldset class="default panel">
			<legend> Filtering </legend>
				<form id = "form_filter" name="form_filter" method="post">
					<div class="form-group col-sm-12 col-md-3">
						<label for="validate-text"></label>
						<div class="input-group col-sm-12 col-md-12"> 
							<input   class = "form-control datepicker" id = "start_date" name = "start_date" placeholder = "Start Date" value = "">
						</div>
					</div>
					<div class="form-group col-sm-12 col-md-3">
						<label for="validate-text"></label>
						<div class="input-group col-sm-12 col-md-12"> 
							<input   class = "form-control datepicker" id = "end_date" name = "end_date" value = "" placeholder = "End Date">							
						</div>
					</div>
					<div class="form-group col-sm-12 col-md-3">
						<label for="validate-email"></label>
						<div class="input-group col-sm-12 col-md-12" >
							<span class = "btn-group">
								<button type = "submit" class="btn btn-default"  > Generate!</buttton>
								<button type = "button" class="btn btn-default" onclick = "clearfilter()" > Clear Filter</buttton>
							</span>
						</div>													
					</div>
				</form>				
		</fieldset>
	</div>
</div>
  
<div class="row-fluid">
	<div class="col-md-6">
		<div class="content-widgets white">
			<div class="widget-head blue">
				<h3>Company Expenses</h3>
			</div>
			<div class="widget-container">
				<div id="chart_div1">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="content-widgets white">
			<div class="widget-head blue">
				<h3>Expenses by Department</h3>
			</div>
			<div class="widget-container">
				<div id="chart_div">
				</div>
			</div>
		</div>
	</div> 
</div>
<div class="row-fluid">
	<div class="col-md-6">
		<div class="content-widgets white">
			<div class="widget-head blue">
				<h3>Expenses by Project</h3>
			</div>
			<div class="widget-container">
				<div id="chart_div3">
				</div>
			</div>
		</div>
	</div>  
</div>


<script src="https://www.google.com/jsapi"></script>

<script>
  $('.datepicker').datepicker({
  format:"dd-mm-yyyy"
  }); 
</script>	
    

<script type="text/javascript"> 
		google.load("visualization", "1", {
		packages: ["corechart"]
		}); 
		google.setOnLoadCallback(drawChart);  
		
   function drawChart() {
    
		var jsonData  = $.ajax({
		url: "<?php echo base_url('hrd/expense_chart_json/');?>", 
		dataType:"json",
		async: false
		}).responseText;
		
		var data = new google.visualization.DataTable(jsonData);
		 
       var options = {
           title: 'expense ammount',
		   slices: [{color: '#b51c44'},{color: '#ce4b27'},{color: '#009600'},{color: '#e88a05'},{color: '#3498db'}]
       };
       var chart = new google.visualization.LineChart(document.getElementById('chart_div1'));
       chart.draw(data, options);
   }
    
	$("form#form_filter").submit(function(e){
	
	e.preventDefault();
			NProgress.inc(); 
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('hrd/expense_chart_json');?>",
				data: $("#form_filter").serialize(),
				success: function(data)
				{
					var datax = new google.visualization.DataTable(data);
					var options = {
					title: 'expense ammount',
					slices: [{color: '#b51c44'},{color: '#ce4b27'},{color: '#009600'},{color: '#e88a05'},{color: '#3498db'}]
					};
					var chart = new google.visualization.LineChart(document.getElementById('chart_div1'));
					chart.draw(datax, options);
					NProgress.done(true);
				}
			});
			
			return false;
	});
	
</script> 
 
<script>
       
	 // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart2);  
	   
   function drawChart2() {
   
		var jsonData  = $.ajax({
		url: "<?php echo base_url('hrd/expense_department_json/');?>", 
		dataType:"json",
		async: false
		}).responseText;
		
		// Create our data table out of JSON data loaded from server.
		  var data = new google.visualization.DataTable(jsonData);
		  
		 var options = {
					title: 'Department',
					slices: [{color: '#b51c44'},{color: '#ce4b27'},{color: '#009600'},{color: '#e88a05'},{color: '#3498db'}]
					};
		// Instantiate and draw our chart, passing in some options.
		  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		  chart.draw(data, {width: 400, height: 240});
   }
</script> 


<script>
       
	 // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart3);  
	   
   function drawChart3() {
   
		var jsonData  = $.ajax({
		url: "<?php echo base_url('hrd/expense_project_json/');?>", 
		dataType:"json",
		async: false
		}).responseText;
		
		// Create our data table out of JSON data loaded from server.
		  var data = new google.visualization.DataTable(jsonData);
		  
		 var options = {
					title: 'Project',
					slices: [{color: '#b51c44'},{color: '#ce4b27'},{color: '#009600'},{color: '#e88a05'},{color: '#3498db'}]
					};
		// Instantiate and draw our chart, passing in some options.
		  var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
		  chart.draw(data, {width: 400, height: 240});
   }
</script> 



				 
			 
			 
				
		 