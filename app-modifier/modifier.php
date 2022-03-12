<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

require_once "Ecouteur.php";
require_once "EcouteurDAO.php";

$ecouteurJSON = file_get_contents('php://input');
$ecouteurObjet = json_decode( $ecouteurJSON );
$ecouteur = new Ecouteur($ecouteurObjet);

$id = EcouteurDAO::modifier($ecouteur);
echo $id;
