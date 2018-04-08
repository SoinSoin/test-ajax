<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  $BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
  pg_connect($BDD);
  $file = "test.json";
  
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <select id="jederoule" data-deroulant="dateDeroulant">
<?php 
$RequeteDate = pg_query("SELECT DISTINCT datejour FROM date order by datejour");
while ($valDate = pg_fetch_array($RequeteDate)) {
    $htmlDate .= '<option>' . $valDate['datejour'] . '</option>';

}
echo $htmlDate;


?>

  </select>

  <input type="button" id="search" value="rechercher">

  <div  id="myChart">

  </div>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
</body>
</html>