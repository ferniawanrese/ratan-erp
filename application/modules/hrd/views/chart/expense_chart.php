   
<script src="https://www.google.com/jsapi"></script>
  
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
<script type="text/javascript">
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
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  5000,       1120],
          ['2007',  1030,      540]
        ]);
        var options = {
          title: 'Company Performance',
		  		  series: [{color: '#3498db',pointSize: '5',curveType:'function'},{color: '#009600',pointSize: '5',curveType:'function'}]
        };
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);
        var options = {
          title: 'Company Performance',
          vAxis: {title: 'Year',  titleTextStyle: {color: 'red'}},
		   series: [{color: '#3498db'},{color: '#e88a05'}]
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);
        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year', titleTextStyle: {color: 'red'}},
		  series: [{color: '#5b3ab6'},{color: '#a300aa'}]
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
<script type="text/javascript">
      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
          ['2004/05',  165,      938,         522,             998,           450,      614.6],
          ['2005/06',  135,      1120,        599,             1268,          288,      682],
          ['2006/07',  157,      1167,        587,             807,           397,      623],
          ['2007/08',  139,      1110,        615,             968,           215,      609.4],
          ['2008/09',  136,      691,         629,             1026,          366,      569.6]
        ]);
        var options = {
          title : 'Monthly Coffee Production by Country',
          vAxis: {title: "Cups"},
          hAxis: {title: "Month"},
          seriesType: "bars",
          series:[{color: '#ce4b27'},{color: '#b51c44', type: "line", curveType:'function'},{color: '#5b3ab6'},{color: '#a300aa'},{color: '#009600'},{color: '#0093a8'}]
        };
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
      }
      google.setOnLoadCallback(drawVisualization);
    </script>
<script type='text/javascript'>
      google.load('visualization', '1', {packages:['gauge']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Memory', 80],
          ['CPU', 55],
          ['Network', 68]
        ]);
        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          greenFrom:75, greenTo: 90,
          minorTicks: 5
        };
        var chart = new google.visualization.Gauge(document.getElementById('chart_div5'));
        chart.draw(data, options);
      }
    </script>
<script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawRegionsMap);
      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          ['Germany', 200],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['RU', 700]
        ]);
        var options = {
			 colorAxis: {colors: ['#009600', '#e88a05', '#3498db']}
			};
        var chart = new google.visualization.GeoChart(document.getElementById('chart_div_geo'));
        chart.draw(data, options);
    };
    </script>
<script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);
      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['City',   'Population', 'Area'],
        ['Rome',      2761477,    1285.31],
        ['Milan',     1324110,    181.76],
        ['Naples',    959574,     117.27],
        ['Turin',     907563,     130.17],
        ['Palermo',   655875,     158.9],
        ['Genoa',     607906,     243.60],
        ['Bologna',   380181,     140.7],
        ['Florence',  371282,     102.41],
        ['Fiumicino', 67370,      213.44],
        ['Anzio',     52192,      43.43],
        ['Ciampino',  38262,      11]
      ]);
      var options = {
        region: 'IT',
        displayMode: 'markers',
        colorAxis: {colors: ['#009600', '#e88a05']}
      };
      var chart = new google.visualization.GeoChart(document.getElementById('chart_div_geo1'));
      chart.draw(data, options);
    };
    </script>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  5000,      2000],
          ['2006',  660,       1120],
          ['2007',  1030,      10000]
        ]);
        var options = {
          title: 'Company Performance',
		  series: [{color: '#3498db',pointSize: '5',curveType:'function'},{color: '#009600',pointSize: '5',curveType:'function'}]
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_div_line'));
        chart.draw(data, options);
      }
    </script>
 
  
			<div class="row-fluid">
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Pie Chart</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Line Chart</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div1">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Bar Chart</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div2">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Bar Chart</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div3">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Bar Chart</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div4">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Meter</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div5">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Geo Map</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div_geo">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Geo Map</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div_geo1">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-md-6">
					<div class="content-widgets white">
						<div class="widget-head blue">
							<h3>Line Chart</h3>
						</div>
						<div class="widget-container">
							<div id="chart_div_line">
							</div>
						</div>
					</div>
				</div>
			</div>
		 