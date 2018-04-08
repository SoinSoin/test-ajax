 <?php


$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
pg_connect($BDD);
$file = "test.json";



///Afficher un camembert permettant l'affichage du pourcentage de chaque categorie de météo (1, 2, 3...)
///pour un jour donné
//requête afin d'avoir le 1er lot de valeur "{"v":1,"f":null}"
// WHERE '".$recupDhtml."'= iddate 
// if( = )

$test = $_POST['value'];
$caca = pg_query("SELECT distinct iddate FROM date where datejour = ' " . $test . " ' ");
$valIddate = pg_fetch_array($caca);
$idDate = $valIddate['iddate'];
// echo $idDate;

$partie1 = pg_query("with humeur as
(SELECT to_char(fk_idhumeur,'9')as v, null as f
FROM  meteodujour 
inner join date on meteodujour.fk_iddate=date.iddate
where date.iddate = '" . $idDate . "'
GROUP BY fk_idhumeur
order by 1)
SELECT row_to_json(humeur) as total
FROM humeur;");

//requête afin d'avoir le 2ème lot de valeur "{"v":6,"f":null}"
$partie2 = pg_query("with total as
(SELECT count(fk_idhumeur) as v, null as f
FROM  meteodujour 
inner join date on meteodujour.fk_iddate=date.iddate
where date.iddate = '" . $idDate . "'
group  by  fk_idhumeur order by fk_idhumeur)
SELECT row_to_json(total) as total
FROM total;");
//var_dump( pg_fetch_row($partie1,0)[0]);
///Création du json selon le modèle gcharts
//la 1ère ligne de cols est obligatoirement de type string

$tableau = '{
    "cols": [
        { "id": "", "label": "humeur", "pattern": "", "type": "string" },
        { "id": "", "label": "nb personnes", "pattern": "", "type": "number" }
    ],
    "rows": [';

$nb_ligne = pg_num_rows($partie2);
$stockValeur = '';
for ($i = 0; $i < $nb_ligne; $i++) {
    $valeurs = '{ "c": [' . pg_fetch_row($partie1, $i)[0] . "," . pg_fetch_row($partie2, $i)[0] . "] }";
    //pour ne pas afficher la virgule pour la dernière fois
    if ($i != $nb_ligne - 1) {
        $virg = ",";
    }
    $stockValeur .= $valeurs . $virg;

}
// 


$fin = "]
}";



$insert .= $tableau . $stockValeur . $fin;
// echo $insert;
file_put_contents($file, $insert);
?>
