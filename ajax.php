<!DOCTYPE html>
<html>
<head>
<?php
	$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
    pg_connect($BDD);
    
    $requete = pg_query("SELECT datejour FROM date;");
    
    while($value=pg_fetch_array( $requete)) { 
    echo $value[0]. "<br/>" ; 
    }

    ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />  
  </head>
 
  <body>
    
    
    
    <div id="curve_chart" style="width: 900px; height: 500px">
    
    </div>


    

    <script type="text/javascript"> </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="jquery.js"></script>
    <script src="ajax.js"></script>
</body>
</html>