 <?php


$BDD = "host=localhost port=5432 dbname=bdd_meteon user=momo  password=postgres";
pg_connect($BDD);
$file = "test.json";


///Afficher un camembert permettant l'affichage du pourcentage de chaque categorie de météo (1, 2, 3...)
///pour un jour donné
//requête afin d'avoir le 1er lot de valeur "{"v":1,"f":null}"
$partie1 = pg_query("with humeur as
(SELECT to_char(fk_idhumeur,'9')as v, null as f
FROM  meteodujour 
inner join date on meteodujour.fk_iddate=date.iddate
where date.iddate = 10
GROUP BY fk_idhumeur
order by 1)
SELECT row_to_json(humeur) as total
FROM humeur;");

//requête afin d'avoir le 2ème lot de valeur "{"v":6,"f":null}"
$partie2 = pg_query("with total as
(SELECT count(fk_idhumeur) as v, null as f
FROM  meteodujour 
inner join date on meteodujour.fk_iddate=date.iddate
where date.iddate = 10 
group  by  fk_idhumeur order by fk_idhumeur)
SELECT row_to_json(total) as total
FROM total;");
//var_dump( pg_fetch_row($partie1,0)[0]);
///Création du json selon le modèle gcharts
//la 1ère ligne de cols est obligatoirement de type string
echo '{
    "cols": [
        { "id": "", "label": "humeur", "pattern": "", "type": "string" },
        { "id": "", "label": "nb personnes", "pattern": "", "type": "number" }
    ],
    "rows": [';
    
$nb_ligne = pg_num_rows($partie2);

for ($i = 0; $i<$nb_ligne; $i++) {

    echo '{ "c": ['.pg_fetch_row($partie1,$i)[0].",".pg_fetch_row($partie2,$i)[0]."] }";
    //pour ne pas afficher la virgule pour la dernière fois
    if ($i !=$nb_ligne-1)
        echo",";
    
}
// 


echo "]
}";



?>
