<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');

$id = $_GET["id"];
$listeEcouteurJson = file_get_contents("liste-ecouteur.json");

if(strlen($listeEcouteurJson) > 0){
  $listeEcouteur = json_decode($listeEcouteurJson);
  foreach($listeEcouteur as $ecouteur) {
      if ($id == $ecouteur->id) {
          echo json_encode($ecouteur);
          die();
      }
  }
}
echo json_encode([]);

