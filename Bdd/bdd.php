<?php

/*
    Modifier ces constantes pour vous connectez à une base de données
*/

const HOTE = "";
const BASE = "";
const UTILISATEUR = "";
const MDP = "";

class BDD{
    private PDO $connexion;

    public function __construct()
    {
        $this->connexion = null; //new PDO(mettre ici vos information de connexion);
    }

    public function deconnecter(){
        unset($this->connexion);
    }

    public function faireRequete($requeteSql){
        $ressource = $this->connexion->prepare($requeteSql);

        $ressource->execute();

        return $ressource->fetchAll(PDO::FETCH_ASSOC);
    }
}