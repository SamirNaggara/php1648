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


    if (!empty($_POST)){
        // On verifie le mail
        if (!isset($_POST["email"]) || !mailOk($_POST["email"])){ // Si le mail n'est pas valide
            $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, votre mail n'est pas conforme au format demandé.
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

        // On envoie une erreur que si la photo existe...
        if (!empty($_FILES["photo"]["name"])){
            // Et que l'image n'est pas ok
            if (!imageOk($_FILES["photo"])){
                $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
                L'image n'est pas au format demandé
              </div>";
            }
            
        }

        $cheminPartiel = $_SESSION["utilisateur"]["photo"];
        if (empty($msg) && !empty($_FILES["photo"]["name"])){
            // Enregistrer la photo a l'endroit choisi
            $cheminPartiel = "photos_profils/profil-".time()."-".uniqid().$_FILES["photo"]["full_path"];
            $cheminPhoto = CHEMIN_UPLOADS . $cheminPartiel;

            if (!move_uploaded_file($_FILES["photo"]["tmp_name"],$cheminPhoto)){
                $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
                    Quelque chose ne s'est pas déroulé correctement au niveau de l'enregistrement de la photo.
                </div>";
            }
        }

        // On fait l'udpate, SI il les message d'erreurs sont vide
        if (empty($msg)){
            $email = trim(htmlentities($_POST["email"]));
            $prenom = trim(htmlentities($_POST["prenom"]));
            $nom = trim(htmlentities($_POST["nom"]));
            $adresse = trim(htmlentities($_POST["adresse"]));

            $requete = "UPDATE abonne SET prenom=:prenom,nom=:nom,mail=:email,adresse=:adresse,photo=:photo WHERE id_abonne = :id";

            $requetePreparee = $dbh->prepare($requete);

            $requetePreparee->bindParam(":prenom", $prenom, PDO::PARAM_STR);
            $requetePreparee->bindParam(":nom", $nom, PDO::PARAM_STR);
            $requetePreparee->bindParam(":email", $email, PDO::PARAM_STR);
            $requetePreparee->bindParam(":adresse", $adresse, PDO::PARAM_STR);
            $requetePreparee->bindParam(":photo", $cheminPartiel, PDO::PARAM_STR);
            $requetePreparee->bindParam(":id", $_SESSION["utilisateur"]["id_abonne"], PDO::PARAM_STR);

            if (!$requetePreparee->execute()){
                $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
                    Quelque chose ne s'est pas déroulé correctement au niveau de l'enregistrement en bdd
                </div>";
            }

            if (empty($msg)){
                $_SESSION["utilisateur"]["email"] = $email;
                $_SESSION["utilisateur"]["prenom"] = $prenom;
                $_SESSION["utilisateur"]["nom"] = $nom;
                $_SESSION["utilisateur"]["adresse"] = $adresse;
                $_SESSION["utilisateur"]["photo"] = $cheminPartiel;

                $msg .= "<div class=\"alert alert-success w-50 mx-auto mt-5\" role=\"alert\">
                    Vos modifications ont bien été prises en compte
                </div>";

            }
        }




    }

    include("inc/head.inc.php");
    include("inc/header.inc.php");
    // include_once("inc/header.inc.php"); include_once s'assure que le fichier n'a pas deja été appelé avant, avant de l'appelé lui même
    // require("inc/header.inc.php") stop le script si le document est introuvable
    // require_once("inc/header.inc.php") stop le script si le document est introuvable, et que le fichier n'a pas été appelé avant



?>

    <main>
        <h1 class="text-center my-5">Votre profil</h1>
        <form action="" method="post" class="container w-75" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= $_SESSION["utilisateur"]["mail"]?>">
                <div id="emailHelp" class="form-text">Votre adresse email</div>
            </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" aria-describedby="nomHelp" name="nom" value="<?= $_SESSION["utilisateur"]["nom"]?>">
                    <div id="nomHelp" class="form-text">Votre Nom</div>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="prenom" aria-describedby="prenomHelp" name="prenom" value="<?= $_SESSION["utilisateur"]["prenom"]?>">
                    <div id="prenomHelp" class="form-text">Votre Prenom</div>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse Postale</label>
                    <input type="text" class="form-control" id="adresse" aria-describedby="adresseHelp" name="adresse" value="<?= $_SESSION["utilisateur"]["adresse"]?>">
                    <div id="adresseHelp" class="form-text">Votre Adresse Postale</div>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inscriptionPhoto" name="photo">
                    <label class="input-group-text" for="inscriptionPhoto">Photo de profil</label>
                </div>
                <?php
                if (!empty($_SESSION["utilisateur"]["photo"])){
                    ?>
                    <div class="photoEnregistrer">
                        <img width="500" class="mx-auto d-block" src="<?= URL . "/upload/" . $_SESSION["utilisateur"]["photo"]?>" alt="Ma photo de profil">
                    </div>
                <?php } ?>
                    <button type="submit" class="btn btn-primary">Modifier mon profil</button>
        </form>
    </main>
<?php

    include("inc/footer.inc.php");
    
?>
        


