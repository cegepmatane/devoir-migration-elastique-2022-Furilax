<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');

require_once "Ecouteur.php";
require_once("EcouteurDAO.php");

$ecouteur = new Ecouteur($_GET);
$ecouteur = EcouteurDAO::chercherParId($ecouteur->id);
echo json_encode($ecouteur);
