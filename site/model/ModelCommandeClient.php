<?php


class ModelCommandeClient extends Model
{
    private $idCommande;
    private $idClient;
    private $dateCommande;
    private $dateLivraison;
    private $idListeClient;


    protected static $objet = 'CommandeClient';
    protected static $primary='idCommande';
}