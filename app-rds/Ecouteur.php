<?php
class Ecouteur implements JsonSerializable
{
  public static $filtres =
    array(
      'id' => FILTER_VALIDATE_INT,
      'nom' => FILTER_SANITIZE_STRING,
      'marque' => FILTER_SANITIZE_STRING,
      'couleur' => FILTER_SANITIZE_STRING,
      'autonomie' => FILTER_SANITIZE_STRING,
      'reductionBruit' => FILTER_SANITIZE_STRING,
      'ecouteEnvironnement' => FILTER_SANITIZE_STRING,
      'resistanceEau' => FILTER_SANITIZE_STRING
    );

  protected $id;
  protected $nom;
  protected $marque;
  protected $couleur;
  protected $autonomie;
  protected $reductionBruit;
  protected $ecouteEnvironnement;
  protected $resistanceEau;

  public function __construct($ecouteurObjet)
  {
    $tableau = filter_var_array((array) $ecouteurObjet, Ecouteur::$filtres);
    $this->id = $tableau['id'];
    $this->nom = $tableau['nom'];
    $this->marque = $tableau['marque'];
    $this->couleur = $tableau['couleur'];
    $this->autonomie = $tableau['autonomie'];
    $this->reductionBruit = $tableau['reductionBruit'];
    $this->ecouteEnvironnement = $tableau['ecouteEnvironnement'];
    $this->resistanceEau = $tableau['resistanceEau'];
  }

  public function __set($propriete, $valeur)
  {
    switch($propriete)
    {
      case 'id':
        $this->id = $valeur;
        break;
      case 'nom':
        $this->nom = $valeur;
        break;
      case 'marque':
        $this->marque = $valeur;
        break;
      case 'couleur':
        $this->couleur = $valeur;
        break;
      case 'autonomie':
        $this->autonomie = $valeur;
        break;
      case 'reductionBruit':
        $this->reductionBruit = $valeur;
        break;
      case 'ecouteEnvironnement':
        $this->ecouteEnvironnement = $valeur;
        break;
      case 'resistanceEau':
        $this->resistanceEau = $valeur;
        break;
    }
  }

  public function __get($propriete)
  {
    $self = get_object_vars($this);
    return $self[$propriete];
  }

  public function jsonSerialize()
  {
    //Define the fields we need
    return array(
      "id"=>$this->id,
      "nom"=>$this->nom,
      "marque"=>$this->marque,
      "couleur"=>$this->couleur,
      "autonomie"=>$this->autonomie,
      "reductionBruit"=>$this->reductionBruit,
      "ecouteEnvironnement"=>$this->ecouteEnvironnement,
      "resistanceEau"=>$this->resistanceEau
    );
  }
}
