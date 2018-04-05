 <?php


$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
pg_connect($BDD);
$file = "test.json";
$requete = pg_query("   ");
echo '  {  "cols":[{ "type": "number"}],   ';

echo' "rows": [';
while ($value = pg_fetch_object($requete)) {



    // $json = [c => [(object)[v => $value[1] ] , (object)[v => $value[2] ]] ];
    // echo $value -> fk_idhumeur.",";
    // $newtab = json_encode($json, true);
    // echo $newtab;
}
echo "]";
echo"}";


// SELECT array_to_json(t)
// FROM (SELECT datejour, fk_idhumeur,count(fk_idhumeur) 
// as "total" 
// FROM  meteodujour 
// inner join date on meteodujour.fk_iddate=date.iddate
//  where date.iddate = 10 
//  group  by datejour, fk_idhumeur order by 1,2) 
// t;


?>
