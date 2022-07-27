<?php 


include("../inc/init.inc.php");
include("../inc/functions.inc.php");


if (!empty($_POST)){
    // On verifie le mail
    if (!isset($_POST["email"]) || !mailOk($_POST["email"])){ // Si le mail n'est pas valide
        $_SESSION["erreurs"] .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Attention, votre mail n'est pas conforme au format demandé.
      </div>";
    }

    // On verifie que le mail existe dans la bdd
    if (!isset($_POST["email"]) || !mailExiste($_POST["email"])){ // Si le mail n'est pas valide
        $_SESSION["erreurs"]  .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Veuillez vous inscrire avant de vous connecter
      </div>";
    }

    
    // On verifie le mdp
    if (!isset($_POST["mdp"]) || !passwordFormatOk($_POST["mdp"])){ // Si le mdp n'est pas valide
        $_SESSION["erreurs"]  .= "<div class=\"alert alert-warning w-50 mx-auto  mt-5\" role=\"alert\">
        Attention, votre mot de passe n'est pas conforme au format demandé.
    </div>";
    }

    if (empty($_SESSION["erreurs"])){
        
        $requete = "SELECT * FROM abonne WHERE mail = :mail";

        $enregistrement = $dbh->prepare($requete);

        $enregistrement->bindParam(":mail", $_POST["email"], PDO::PARAM_STR);
    
        $enregistrement->execute();

        $utilisateur = $enregistrement->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST["mdp"],$utilisateur["mdp"])){
            $_SESSION["utilisateur"] = $utilisateur;
            $_SESSION["erreurs"] = "<div class=\"alert alert-success w-50 mx-auto  mt-5\" role=\"alert\">
            Bravo, vous êtes connecté
                </div>";
            header("Location: ". URL . "/profil.php");
            die();
        }else{
            $_SESSION["erreurs"]  .= "<div class=\"alert alert-warning w-50 mx-auto  mt-5\" role=\"alert\">
        Attention, votre mot de passe n'est pas valide
            </div>";
        }
    }
}

header("Location: ". URL);