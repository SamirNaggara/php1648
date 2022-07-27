<?php 

$msg="";

// Verication du nom
if (!isset($_GET["nom"]) || empty($_GET["nom"])){
    $msg .= "<p>Attention, le nom est vide ou n'existe pas !</p>";
}

// Verification du choix
if (!isset($_GET["choix"]) || empty($_GET["choix"])){
    $msg .= "<p>Attention, le choix n'est pas correct !</p>";
}


if (empty($msg)){
    $nom = $_GET["nom"];
    $choix = $_GET["choix"];


    if ($choix == "amour"){
        $msg = "<p>Lettre d'amour pour toi, $nom</p>";
    }else if ($choix == "haine"){
        $msg = "<p>Je te deteste, $nom</p>";
    }else{
        $msg = "<p>Quelque chose d'imprévue s'est produit.</p>";
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
        <title>Voila votre lettre !</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <p><?= $msg ?></p>
    </body>
</html>