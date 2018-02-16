<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.canvasjs.min.js"></script>
<script type="text/javascript" src="canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function() {
	var dataPoints = [];
	var chart;
	$.getJSON("test.json", function(data) {  
        console.log(data);
		$.each(data, function(key, value){
			// dataPoints.push(
            //         {
            //         x: parseInt(datejour)[0], 
            //         y: parseInt(fk_idhumeur[1]), 
            //         z: parseInt(total[2])
            //         }
            //         );
            // console.log(value)
		});
		chart = new CanvasJS.Chart("chartContainer",{
			title:{
				text:"Live Chart with dataPoints from External JSON"
			},
			data: [{
				type: "line",
				dataPoints : dataPoints,
			}]
		});
		chart.render();
		updateChart();
	});
	function updateChart() {
	$.getJSON("test.json" + (dataPoints.length + 1) + (dataPoints[dataPoints.length - 1].y) + function(data) {
		$.each(data, function(key, value) {
			dataPoints.push({
			x: parseInt(datejour[1]),
			y: parseInt(fk_idhumeur[2]),
			z: parseInt(total[3])
			});
		});
		chart.render();
		setTimeout(function(){updateChart()}, 1000);
	});
	}
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>