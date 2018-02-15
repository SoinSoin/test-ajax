<?php
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL
// echo(' {"cols": [{"id": "datejour","label":"", "type"="date"},
//                             {"id":"fk_idhumeur","label":"", "type"="number"},
//                             {"id":"total","label":"", "type"="number"}],
//                             "rows": [ ');

$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
pg_connect($BDD);
$requete = pg_query("SELECT datejour, fk_idhumeur,count(fk_idhumeur) as \"total\" FROM  meteodujour inner join date on meteodujour.fk_iddate=date.iddate group by datejour, fk_idhumeur order by 1,2;");
// $value=pg_fetch_array( $requete);
$file="test.json";
// print_r($value);
while($value=pg_fetch_array( $requete)) { 
//   echo  $value[0] ; 
// $tablometeojour=array($value['datejour'], $value['fk_idhumeur'],$value['total']);
//  $foo= json_encode($tablometeojour);
//  echo $foo;
$json["datejour"]=$value['datejour'];
$json["fk_idhumeur"]=$value['fk_idhumeur'];
$json["total"]=$value['total'];
$cara=json_encode($json);
//  echo $cara;
file_put_contents($file,$cara,FILE_APPEND | LOCK_EX);
$string=file_get_contents("test.json");
}
echo $string;
// echo("]}");
//   SELECT 
//   datejour, fk_idhumeur,count(fk_idhumeur) as "total"
//   FROM
//   meteodujour
//   inner join date on meteodujour.fk_iddate=date.iddate
//   group by datejour, fk_idhumeur
//   order by 1,2;
// $encrjson=var_dump(json_decode($value));
//  file_put_contents("test.json",$encrjson, FILE_APPEND | LOCK_EX);

?>
