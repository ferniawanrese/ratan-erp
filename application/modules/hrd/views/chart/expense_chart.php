<div class="row-fluid">
	<div class="col-md-12">
		<fieldset class="default panel">
			<legend> Filtering </legend>
			
				<div class="form-group col-sm-12 col-md-3">
					<label for="validate-text"></label>
					<div class="input-group col-sm-12 col-md-12"> 
						<input   class = "form-control datepicker" id = "start_date" name = "start_date" value = "">
					</div>
				</div>
				<div class="form-group col-sm-12 col-md-3">
					<label for="validate-text"></label>
					<div class="input-group col-sm-12 col-md-12"> 
						<input   class = "form-control datepicker" id = "end_date" name = "end_date" value = "">							
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
				<div id="chart_divx">
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
  
<script>
  google.load("visualization", "1", {
   packages: ["corechart"]
});
google.setOnLoadCallback(drawChart);
function drawChart() {
   var data = google.visualization.arrayToDataTable([
	   ['Task', 'Hours per Day'],
	   ['Work', 11],
	   ['Eat', 2],
	   ['Commute', 2],
	   ['Watch TV', 2],
	   ['Sleep', 7]
   ]);
   var options = {
	   title: 'My Daily Activities',
	   slices: [{color: '#b51c44'},{color: '#ce4b27'},{color: '#009600'},{color: '#e88a05'},{color: '#3498db'}]
   };
   var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
   chart.draw(data, options);
}
</script> 
	
<script>
      google.load("visualization", "1", {
       packages: ["corechart"]
   });
   google.setOnLoadCallback(drawChart);
   function drawChart() {
       var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'],
           ['Work', 11],
           ['Eat', 2],
           ['Commute', 2],
           ['Watch TV', 2],
           ['Sleep', 7]
       ]);
       var options = {
           title: 'My Daily Activities',
		   slices: [{color: '#b51c44'},{color: '#ce4b27'},{color: '#009600'},{color: '#e88a05'},{color: '#3498db'}]
       };
       var chart = new google.visualization.PieChart(document.getElementById('chart_divx'));
       chart.draw(data, options);
   }
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
           title: 'My Daily Activities',
		   slices: [{color: '#b51c44'},{color: '#ce4b27'},{color: '#009600'},{color: '#e88a05'},{color: '#3498db'}]
       };
       var chart = new google.visualization.LineChart(document.getElementById('chart_div1'));
       chart.draw(data, options);
   }
</script> 


				 
			 
			 
				
		 