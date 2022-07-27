<?php

// On active les sessions
session_start();

print_r($_SESSION);

// Si le mail existe dans la session, alors on redirige vers profil
if (isset($_SESSION["mail"])){
    header("Location: profil.php");
    die();
}

$msgError = "";
$mail = "";
$mdp = "";

function videur(string $mail, string $mdp) : bool{
    // Verif mail
    if ($mail != "admin@wf3.org"){
        return false;
    }

    // Verif mdp
    if ($mdp != "pikachu"){
        return false;
    }

    return true;
} 




if (!empty($_POST)){

    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    // Verification du format du mail
    if (!isset($_POST["mail"]) || empty($_POST["mail"])){
        $msgError .= "<div class=\"alert alert-danger w-50 mx-auto mb-5\" role=\"alert\">
        Attention, il faut remplir le champs mail
      </div>";
    }

    // Verification du format du mdp
    if (!isset($_POST["mdp"]) || empty($_POST["mdp"])){
        $msgError .= "<div class=\"alert alert-danger w-50 mx-auto mb-5\" role=\"alert\">
        Attention, il faut remplir le champs mot de passe
      </div>";
    }

    // Verification d'identité

    if (empty($msgError)){

        if (!videur($mail, $mdp)){
            $msgError .= "<div class=\"alert alert-danger w-50 mx-auto mb-5\" role=\"alert\">
            Attention, le mail ou le mdp n'est pas bon
          </div>";
        }else{

            // Je stock le mail de l'utilisateur dans la sessions
            $_SESSION["mail"] = $mail;

            header('Location: profil.php');
            exit;
        }

        

    }

    

}








?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>La méthode POST</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        

        <h1 class="text-center fs-1 my-5">Formulaire de connexion</h1>
        <div>
            <?= $msgError ?>
       </div>
        <form action="" method="post" class="container mx-5">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Votre mail" value="<?= $mail ?>">
                <label for="mail">Ecivez votre mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Votre mot de passe" value="<?= $mdp ?>">
                <label for="mdp">Mot de Passe</label>
            </div>
            <button class="btn btn-primary mt-5" type="submit">Me connecter</button>
       </form>

       

        <!-- 1_ Creer un formulaire avec mail et mdp 

        2_ Sur la meme page, s'assurer que la personne soit transferée vers la page profil.php,
        si et seulement si le mail est admin@wf3.org, et le mdp pikachu
        -> Pensez au header location pour faire une redirection

        3_ Sur profil.php, vous pouvez ecrire une phrase "bravo, vous êtes connecté" -->



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>







