<?php
interface EcouteurSQL
{
  public const SQL_LISTER          = "SELECT * FROM ecouteur;";
  public const SQL_CHERCHER_PAR_ID = "SELECT * FROM ecouteur WHERE id = :id;";
  public const SQL_AJOUTER         = "INSERT INTO ecouteur (nom, marque, couleur, autonomie, reductionBruit, ecouteEnvironnement, resistanceEau) VALUES (:nom, :marque, :couleur, :autonomie, :reductionBruit, :ecouteEnvironnement, :resistanceEau);";
  public const SQL_MODIFIER        = "UPDATE ecouteur SET nom = :nom, marque = :marque, couleur = :couleur, autonomie = :autonomie, reductionBruit = :reductionBruit, ecouteEnvironnement = :ecouteEnvironnement, resistanceEau = :resistanceEau where id = :id";
}
