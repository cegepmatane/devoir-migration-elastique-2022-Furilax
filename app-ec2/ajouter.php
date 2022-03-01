<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$ecouteurJSON = file_get_contents('php://input');
$ecouteur= json_decode( $ecouteurJSON );
print_r($ecouteur);

$listeEcouteur = [];
$listeEcouteurJson = file_get_contents("liste-ecouteur.json");

if(strlen($listeEcouteurJson) > 0){
  $listeEcouteur = json_decode($listeEcouteurJson);
  $nombreEcouteur = count($listeEcouteur);

  $ecouteur->id = $nombreEcouteur;
  array_push($listeEcouteur, $ecouteur);
  print_r($listeEcouteur);
}

$listeEcouteurJson = json_encode($listeEcouteur);

/* Linux
sudo chgrp www-data liste-ecouteur.json
sudo chmod g+w liste-ecouteur.json
*/

file_put_contents("liste-ecouteur.json", $listeEcouteurJson);
