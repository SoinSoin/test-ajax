<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
	$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
    pg_connect($BDD);
    $requete = pg_query("SELECT datejour FROM date;");
    $value=pg_fetch_array( $requete);
    
  while($value=pg_fetch_array( $requete)) { 
    echo  $value[0]. "<br/>" ; 
    }
    ?>
    <script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
var tableau_js = <?php echo $value; ?>;
alert(tableau_js);
function drawChart() {
var data = google.visualization.arrayToDataTable(
[
  ["date","humeur"],
  ["02/02/2018",5]
]
);

var options = {
title: 'derniere chance',
curveType: 'function',
legend: { position: 'bottom' }
};

var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

chart.draw(data, options);
} 
</script>
  </head>
 
  <body>


<div id="curve_chart" style="width: 900px; height: 500px">
    </div>


</body>
</html>