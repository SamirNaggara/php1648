<?php 

    include("inc/init.inc.php");
    include("inc/functions.inc.php");

    if (is_connect()){
        $_SESSION["erreur"] = "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, la liste des abonnés n'est accessible qu'aux administrateurs
          </div>";
        header("Location:".URL);
        exit();
    }

  
    
    
    $title .= " - Inscription";
    
    // debug($_POST);

    if (!empty($_POST)){

        // debug($_POST);
        // debug($_FILES);
        // debug($_SERVER);
        // die();

        // On verifie le mail
        if (!isset($_POST["email"]) || !mailOk($_POST["email"])){ // Si le mail n'est pas valide
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, votre mail n'est pas conforme au format demandé.
          </div>";
        }

        // On verifie que le mail est unique
        if (!isset($_POST["email"]) || mailExiste($_POST["email"])){ // Si le mail n'est pas valide
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, le mail doit être unique !
          </div>";
        }

        // On verifie le mdp
        if (!isset($_POST["mdp"]) || !passwordFormatOk($_POST["mdp"])){ // Si le mdp n'est pas valide
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto  mt-5\" role=\"alert\">
            Attention, votre mot de passe n'est pas conforme au format demandé.
          </div>";
        }


        // On verifie le nom
        if (!isset($_POST["nom"]) || !nomOk($_POST["nom"])){ // Si le nom n'est pas valide
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, votre nom n'est pas conforme au format demandé.
          </div>";
        }


        // On verifie le prenom
        if (!isset($_POST["prenom"]) || !prenomOk($_POST["prenom"])){ // Si le prenom n'est pas valide
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, votre prenom n'est pas conforme au format demandé.
          </div>";
        }


        // On verifie le adresse
        if (!isset($_POST["adresse"]) || !adresseOk($_POST["adresse"])){ // Si le adresse n'est pas valide
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, votre adresse n'est pas conforme au format demandé.
          </div>";
        }

        // On verifie que la confidentialité a été accepté
        if (!isset($_POST["confidentialite"]) || $_POST["confidentialite"] != "ok"){
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Vous devez accepter les politiques de confidentialité
          </div>";
        }

        // On verifie que la confidentialité a été accepté
        if (!isset($_FILES["photo"]) || !imageOk($_FILES["photo"])){
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Vous devez accepter les politiques de confidentialité
          </div>";
        }

        if (empty($msg)){
            // Enregistrer la photo a l'endroit choisi

            $cheminPhoto = CHEMIN_UPLOADS . "photos_profils/profil-".time()."-".uniqid().$_FILES["photo"]["full_path"];

            if (!move_uploaded_file($_FILES["photo"]["tmp_name"],$cheminPhoto)){
                $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
                    Quelque chose ne s'est pas déroulé correctement au niveau de l'enregistrement de la photo.
                </div>";
            }
        }

        if (empty($msg)){
            // On enregistre les infos dans des variables, en enlevant les espaces avant et apres, et en securisant les inputs
            $email = trim(htmlentities($_POST["email"]));
            $mdp = trim(htmlentities($_POST["mdp"]));
            $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
            $prenom = trim(htmlentities($_POST["prenom"]));
            $nom = trim(htmlentities($_POST["nom"]));
            $adresse = trim(htmlentities($_POST["adresse"]));

            $requete = "INSERT INTO abonne (prenom, nom, mail, adresse, mdp, photo) VALUES (:prenom,:nom,:email,:adresse,:mdp,:photo)";

            // On prépare la requete, puis on relie chaque élément a sa variable avec bindParam
            $requetePreparee = $dbh->prepare($requete);

            $requetePreparee->bindParam(":prenom", $prenom, PDO::PARAM_STR);
            $requetePreparee->bindParam(":nom", $nom, PDO::PARAM_STR);
            $requetePreparee->bindParam(":email", $email, PDO::PARAM_STR);
            $requetePreparee->bindParam(":adresse", $adresse, PDO::PARAM_STR);
            $requetePreparee->bindParam(":mdp", $mdp_hache, PDO::PARAM_STR);
            $requetePreparee->bindParam(":photo", $cheminPhoto, PDO::PARAM_STR);

            // on execute la requette
            $resultat = $requetePreparee->execute();

            if ($resultat){
                $msg .= "<div class=\"alert alert-success w-50 mx-auto mt-5\" role=\"alert\">
                        Bravo, vous êtes bien inscrit !<br>Allez maintenant vous connecter !
                </div>";
            }else{
                $msg .= "<div class=\"alert alert-danger w-50 mx-auto mt-5\" role=\"alert\">
                        Il y a eu une erreur au moment de l'inscription en base de donnée
                </div>";
            }




        }


    }

    include("inc/head.inc.php");
    include("inc/header.inc.php");
   
    // Inserer un formulaire qui correspond à ce qu'on va enregistrer dans la base de donnée

    

?>
    <h1 class="text-center my-5">Inscription</h1>
    <form action="" method="post" class="container w-75 mw-auto" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= (isset($_POST["email"])) ? $_POST["email"] : ""?>">
            <div id="emailHelp" class="form-text">Votre adresse email</div>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" value="<?= (isset($_POST["mdp"])) ? $_POST["mdp"] : ""?>">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" aria-describedby="nomHelp" name="nom" value="<?= (isset($_POST["nom"])) ? $_POST["nom"] : ""?>">
            <div id="nomHelp" class="form-text">Votre Nom</div>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom" aria-describedby="prenomHelp" name="prenom" value="<?= (isset($_POST["prenom"])) ? $_POST["prenom"] : ""?>">
            <div id="prenomHelp" class="form-text">Votre Prenom</div>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse Postale</label>
            <input type="text" class="form-control" id="adresse" aria-describedby="adresseHelp" name="adresse" value="<?= (isset($_POST["adresse"])) ? $_POST["adresse"] : ""?>">
            <div id="adresseHelp" class="form-text">Votre Adresse Postale</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="confidentialite" name="confidentialite" value="ok">
            <label class="form-check-label" for="confidentialite">J'accepte les politiques de confidentialités</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inscriptionPhoto" name="photo">
            <label class="input-group-text" for="inscriptionPhoto">Photo de profil</label>
        </div>
        <button type="submit" class="btn btn-primary">Je m'inscris</button>
    </form>
<?php

    include("inc/footer.inc.php");
    
?>
        


