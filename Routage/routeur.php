<?php

require_once("route.php");

class Routeur {
    private array $routes;

    function __construct($routes)
    {
        $this->routes = $routes;
    }

    function trouverRoute($urlBrute, $methode){
        $url = $this->traiterUrl($urlBrute);
        foreach ($this->routes as $route) {
            if ($this->testerCorrespondance($url,$methode,$route)) {
                if ($route->avoirMethode() == "GET") {
                    $this->httpGet($route);
                    return;
                } else {
                    $this->httpPost($route);
                    return;
                }
            }
        }
        echo "Pas de route pour " .$urlBrute . " /" . $url;
    }

    private function testerCorrespondance($url, $methode, Route $route){
        return $route->avoirUrl() == $url && $route->avoirMethode() == $methode;
    }

    private function httpGet(Route $route){
        require($route->avoirChemin());
    }

    private function httpPost(Route $route){
        $callback = $route->avoirCallBack();

        $callback($route);
    }

    private function traiterUrl($urlBrute){
        $urlBrute = str_replace("\\", "/", $urlBrute);
        $urlBrute = str_replace("index.php","",$urlBrute);
        $urlBrute = str_replace("?p=","",$urlBrute);
        return $urlBrute;
    }
}