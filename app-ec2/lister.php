<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');

$listeEcouteurJson = file_get_contents("liste-ecouteur.json");

if(strlen($listeEcouteurJson) > 0){
  $listeEcouteur = json_decode($listeEcouteurJson);
  echo json_encode($listeEcouteur);
}else{
  echo json_encode([]);
}