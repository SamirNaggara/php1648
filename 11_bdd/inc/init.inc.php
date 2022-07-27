<?php 


// Initialisation de la bdd

$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}


// Demarrer une nouvelle session

session_start();


// On initialise $msg pour mettre des message d'erreur en dessous du header
$msg="";
$title = "My Bibli";




// Definir l'url du site web 

define("URL", 'http://localhost/php/11_bdd');
define("CHEMIN_UPLOADS", $_SERVER["DOCUMENT_ROOT"] . "/PHP/11_bdd/upload/");


// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

// Gestion des photos
$formatAutorisee = ["image/png", "image/jpg","image/jpeg","image/gif"];
