<?php 

include("inc/init.inc.php");
include("inc/functions.inc.php");

if (!is_connect_admin()){
    $_SESSION["erreur"] = "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Attention, l'ajout de livre n'est accessible qu'aux administrateurs
      </div>";
    header("Location:".URL);
    exit();
}

include("inc/head.inc.php");
include("inc/header.inc.php");


include("inc/footer.inc.php");


/*  1_ Creer la page ajout-livre.php
    2_ Ajouter les includes, et personnaliser le title
    3_ Ajouter cette page ajout-livre au menu
    4_ Creer le formulaire d'ajout de livre
    5_ Verifier sommairement le format des champs un par un, sinon, mettre un message d'erreur
    6_ Si pas de message d'erreur, enregistrer les infos dans des variables
    7_ On cree le requete sql (a verifier dans phpmyadmin)
    8_ On utilise la méthode prépare, et on relie les parametres avec bind param
    9_ On execute la requete
    10_ Si la requete a marché, on envoie un message de succes, sinon, un message d'erreur

*/