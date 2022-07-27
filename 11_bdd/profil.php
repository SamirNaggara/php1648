<?php 

    include("inc/init.inc.php");
    include("inc/functions.inc.php");

    if (!is_connect()){
        $_SESSION["erreur"] = "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Attention, la liste des livres n'est accessible qu'aux membres connectés
      </div>";
        header("Location:" . URL);
        exit();
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
        


