<?php

require_once("modeles/Modele.php");

class Controleur
{
    private Modele $modele;

    public function __construct(){
        $this->modele = new Modele();
    }

    public function deconnecter(){
        $this->modele->deconnecter();
    }

    public function faireQuelqueChose() : array{
        //Ici, on peut récupéré les données transmise via GET et POST.
        $fruits = $this->modele->faireQuelqueChose();
        //Un peu de code logique. Il peut être sur la vue aussi, l'exemple est mauvais :p
        if ($fruits != []) {
            return $fruits;
        }
        else{
            return ["Il n'y a pas de fruits aujourd'hui :/"];
        }
    }

    public function faireQuelqueChosePost() : string{
        if (isset($_POST["fruit"])) {
            $fruit = $_POST["fruit"];
        }
        else{
            $fruit = "Vous n'avez pas utiliser ma méthode :/";
        }
        
        return "Le fruit que vous avez saisi est : " . $fruit;
    }

    /*Il faut rajouter des méthodes pour chaque action que fera l'application*/
}