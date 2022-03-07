<?php
require_once("Ecouteur.php");
require_once("EcouteurSQL.php");

class Accesseur
{
  public static $baseDeDonnees = null;

  public static function initialiser()
  {
    $base = 'app-ecouteur';
    $hote = 'app-ecouteur.cvxnwxz5umdx.us-east-1.rds.amazonaws.com';
    $usager = 'matteo';
    $motDePasse = 'deloulou518';
    $nomDeSourceDeDonnees = 'mysql:dbname=' . $base . ';host=' . $hote;
    EcouteurDAO::$baseDeDonnees = new PDO($nomDeSourceDeDonnees, $usager, $motDePasse);
    EcouteurDAO::$baseDeDonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}

class EcouteurDAO extends Accesseur implements EcouteurSQL
{
  public static function lister()
  {
    EcouteurDAO::initialiser();

    $demandeListeEcouteur = EcouteurDAO::$baseDeDonnees->prepare(EcouteurDAO::SQL_LISTER);
    $demandeListeEcouteur->execute();
    $listeEcouteurObjet = $demandeListeEcouteur->fetchAll(PDO::FETCH_OBJ);
    //$contratsTableau = $demandeListeEcouteur->fetchAll(PDO::FETCH_ASSOC);
    $listeEcouteur = null;
    foreach($listeEcouteurObjet as $ecouteurObjet) $listeEcouteur[] = new Ecouteur($ecouteurObjet);
    return $listeEcouteur;
  }

  public static function chercherParId($id)
  {
    EcouteurDAO::initialiser();

    $demandeEcouteur = EcouteurDAO::$baseDeDonnees->prepare(EcouteurDAO::SQL_CHERCHER_PAR_ID);
    $demandeEcouteur->bindParam(':id', $id, PDO::PARAM_INT);
    $demandeEcouteur->execute();
    $ecouteurObjet = $demandeEcouteur->fetchAll(PDO::FETCH_OBJ)[0];
    //$contrat = $demandeEcouteur->fetch(PDO::FETCH_ASSOC);
    return new Ecouteur($ecouteurObjet);
  }

  public static function ajouter($ecouteur)
  {
    EcouteurDAO::initialiser();

    $demandeAjoutEcouteur = EcouteurDAO::$baseDeDonnees->prepare(EcouteurDAO::SQL_AJOUTER);
    $demandeAjoutEcouteur->bindValue(':nom', $ecouteur->nom, PDO::PARAM_STR);
    $demandeAjoutEcouteur->bindValue(':marque', $ecouteur->marque, PDO::PARAM_STR);
    $demandeAjoutEcouteur->bindValue(':couleur', $ecouteur->couleur, PDO::PARAM_STR);
    $demandeAjoutEcouteur->bindValue(':autonomie', $ecouteur->autonomie, PDO::PARAM_STR);
    $demandeAjoutEcouteur->bindValue(':reductionBruit', $ecouteur->reductionBruit, PDO::PARAM_STR);
    $demandeAjoutEcouteur->bindValue(':ecouteEnvironnement', $ecouteur->ecouteEnvironnement, PDO::PARAM_STR);
    $demandeAjoutEcouteur->bindValue(':resistanceEau', $ecouteur->resistanceEau, PDO::PARAM_STR);
    $demandeAjoutEcouteur->execute();
    return EcouteurDAO::$baseDeDonnees->lastInsertId();
  }

  public static function modifier($ecouteur)
  {
    EcouteurDAO::initialiser();

    $demandeModifEcouteur = EcouteurDAO::$baseDeDonnees->prepare(EcouteurDAO::SQL_MODIFIER);
    $demandeModifEcouteur->bindValue(':nom', $ecouteur->nom, PDO::PARAM_STR);
    $demandeModifEcouteur->bindValue(':marque', $ecouteur->marque, PDO::PARAM_STR);
    $demandeModifEcouteur->bindValue(':couleur', $ecouteur->couleur, PDO::PARAM_STR);
    $demandeModifEcouteur->bindValue(':autonomie', $ecouteur->autonomie, PDO::PARAM_STR);
    $demandeModifEcouteur->bindValue(':reductionBruit', $ecouteur->reductionBruit, PDO::PARAM_STR);
    $demandeModifEcouteur->bindValue(':ecouteEnvironnement', $ecouteur->ecouteEnvironnement, PDO::PARAM_STR);
    $demandeModifEcouteur->bindValue(':resistanceEau', $ecouteur->resistanceEau, PDO::PARAM_STR);
    $demandeModifEcouteur->execute();
    return EcouteurDAO::$baseDeDonnees->lastInsertId();
  }
}
