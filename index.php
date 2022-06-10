<?php 
/*
    Voir ici si je ne suis pas clair :
    https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4678891-nouvelle-fonctionnalite-afficher-des-commentaires

    Cette application utilise un design pattern (patron de conception) nommé MVC, pour Modèle Vue controleur.

    Son fonctionnement est simple : Lorsque un utilisateur veux afficher un élément, il se rend sur son controleur. Celui-ci interoge le modele de l'élément,
    qui vas chercher les données à afficher en BDD, et lui donne. Il vas ensuite faire un require qui appelle la vue, qui vas utilisé les données du contrôleur
    pour faire l'affichage au propre.

    On a donc : Des modèles qui communique avec la BDD
                Des controleurs qui son dédié à une action est font appel à un modèle
                Des vues appeler par un controleur et exploitant ses données pour faire un affichage.    
*/
/*
    Ici, on retrouve le router de notre application. Toutes les URL utiliseronts la forme suivante : index.php?p="chaineCorrespondant à une page" avec un paramètre:
        p=la chaine qui reconnaie ma page.
    Le routeur supprime l'index.php et ce qui l'y a devant (si le serveur est mal configurer) afin de simplifié l'utilisation des URL custom.

    Note : Si votre route doit avoir des paramètres (l'id d'un élément par exemple) il faudra passé directement par un controleur.

*/
#----------------------------------------------------------------------------------------------------------------------------------------------------------------#
/*
    Pour commencer, on reçoit une URL demandée par un client ainsi que la methode Http qu'il utilise
*/
$urlRecue = $_SERVER["REQUEST_URI"];
$methodeHttp = $_SERVER["REQUEST_METHOD"];
/*
    On déclare des constantes pour les méthodes HTTP qu'on vas utiliser
*/
const GET = "GET";
const POST = "POST";
/*
    On importe la classe des routeurs et des routes.
*/
require_once("routage/route.php");
require_once("routage/routeur.php");
/*
    Ici, on définie les routes de notre application, via une url (à gauche) et un chemin physique (à droite).
    On ajoute aussi une méthode HTTP GET ou POST
*/
$routes = [new Route("", __DIR__ . "Vues/Vue.php", GET, function ($route){
            require_once ("unContrôleur");

            $monControleur = new Controleur();

            $monControleur->faireQuelqueChose();
            //Note : on peut mettre un controlleur à la place du chemin et le mettre dans le require_once en haut.
            require ($route->avoirChemin());
        }),
        new Route("/", __DIR__ . "Vue/VueSaisi.php", GET, null),
        new Route("affichageFruit", __DIR__ . "/Vues/VueInsertion.php", POST, function ($route){
            require_once("/controleurs/Controleur.php");

            $controleur = new Controleur();

            $message = $controleur->faireQuelqueChosePost();

            require($route->avoirChemin());
        }),
    ];

/*
    On créé le router de notre application, en lui donnant nos routes
*/
$routeur = new Routeur($routes);
/*
    On fait appel à la méthode httpGet, qui comment la commande GET du protocole HTTP, demande une ressource au serveur.
    On récupère le chemin de la ressource, et on l'affiche avec un require ici. Cela signifie que nous n'avons pas bouger de
    ce fichier. Faite donc attention à vos import ! (require(), header()...)
*/
$routeur->trouverRoute($urlRecue,$methodeHttp);