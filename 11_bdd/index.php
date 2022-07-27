<?php 

    include("inc/init.inc.php");
    include("inc/functions.inc.php");

    // Gere la deconnexion
    if (isset($_GET["action"]) && $_GET["action"] == "deconnexion"){
        session_destroy();
        header("Location:".URL."?message=deconnexion");
        die();
        
    }

    // Affiche le message de deconnexion
    if (isset($_GET["message"]) && $_GET["message"] == "deconnexion"){
        $msg .= "<div class=\"alert alert-success w-50 mx-auto mt-5\" role=\"alert\">
            Vous êtes bien deconnecté !
          </div>";
    }


    include("inc/head.inc.php");
    include("inc/header.inc.php");
    // include_once("inc/header.inc.php"); include_once s'assure que le fichier n'a pas deja été appelé avant, avant de l'appelé lui même
    // require("inc/header.inc.php") stop le script si le document est introuvable
    // require_once("inc/header.inc.php") stop le script si le document est introuvable, et que le fichier n'a pas été appelé avant



?>

<?php

    include("inc/footer.inc.php");
    
?>
        


