google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart(tableau_js));

$(document).ready(function(){
  $.post("ajax.php", function(data){
    $(".requete").html(data);
    console.log(data);
  });

});



function drawChart(data) {
  var tablo = google.visualization.arrayToDataTable(
data
);

  var options = {
    title: 'derniere chance',
    curveType: 'function',
    legend: { position: 'bottom' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

  chart.draw(data, options);
}