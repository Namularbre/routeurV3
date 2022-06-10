<?php

class Route {
    private string $url;
    private string $chemin;
    private string $methode;
    private $callback;

    function __construct($url, $chemin, $methode, $callback)
    {
        $this->url = $url;
        $this->chemin = $chemin;
        if ($this->verifierQueLaRouteAUneMethodeValide($methode)) {
            $this->methode = $methode;
        }
        else {
            throw new Exception("Il y a eu une erreur à la création des routes, car l'une d'entre elles n'utilise pas une méthode http valide GET ou POST");
        }
        $this->callback = $callback;
    }

    function avoirUrl()
    {
        return $this->url;
    }

    function avoirChemin()
    {
        return $this->chemin;
    }

    function avoirMethode()
    {
        return $this->methode;
    }

    function avoirCallBack()
    {
        return $this->callback;
    }

    private function verifierQueLaRouteAUneMethodeValide($methode)
    {
        return $methode == "GET" || $methode == "POST";
    }
}