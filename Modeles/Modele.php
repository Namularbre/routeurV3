<?php

/*
    Si vous avez besoin d'une connection à une base, cela se passe ici ! Il vous faudra decommenter le code.

*/

require("Bdd/bdd.php");

class Modele{
    private BDD $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function deconnecter(){
        $this->bdd->deconnecter();
        unset($this->bdd);
    }

    public function faireQuelqueChose(){
        return ["Pomme", "Poire", "Citron"];
    }
}