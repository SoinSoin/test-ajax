    <?php
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL

// function toto(){ 
// echo(' {"cols": [{"id": "datejour","label":"", "type"="date"},
//                             {"id":"fk_idhumeur","label":"", "type"="number"},
//                             {"id":"total","label":"", "type"="number"}],
//                             rows: [{c:[{v: "a"},');

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

$arra=
array("rows"=> array(c=>array(v=>$value['datejour'],$value['fk_idhumeur'],$value['total'])));
               
                            $tab=json_encode($arra);
echo $tab;

file_put_contents($file,$tab);

// print_r($arra);

// $json["fk_idhumeur"]=$value['fk_idhumeur'];
// $json["total"]=$value['total'];
// echo("{");
// echo("v:"); 
echo $cara;
// echo("}");


}
// echo $string;

// }
// $test=toto();
// $file="test.json";
// file_put_contents($file,$test);

// $string=file_get_contents("test.json");
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
