
      $("#jederoule").on("click",function(){
        var selectDate=$(this,"option").val();
        console.log(selectDate);
        $.ajax({
          url: "recup.php",
          method: "POST",
          dataType: "html",
          data: {value : selectDate},
      })
    })


    $("#search").on("click",function(){
              // Load the Visualization API and the piechart package.
              google.charts.load('current', {'packages':['corechart']});
      
              // Set a callback to run when the Google Visualization API is loaded.
              google.charts.setOnLoadCallback(drawChart);
                
              function drawChart() {
                var jsonData = $.ajax({
                    url: "test.json",
                    dataType: "json",
                    async: false
                    }).responseText;
          
          
                    
                // Create our data table out of JSON data loaded from server.
                var data = new google.visualization.DataTable(jsonData);
          
                // la variable qui permet de dessiner le graphique dans une div
                var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
                console.log(chart);
                chart.draw(data, {width: 400, height: 240});
              }
            });