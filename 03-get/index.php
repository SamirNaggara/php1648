<?php 

echo "<pre>";
print_r($_GET);
echo "</pre>";

$msg = "";

// Si le nom, le prenom et le sexe existent dans le formulaire
if (isset($_GET["nom"]) && !empty($_GET["nom"]) 
    && isset($_GET["prenom"]) && !empty($_GET["prenom"]) 
    && isset($_GET["sexe"]) && !empty($_GET["sexe"]) ){


    $nom = $_GET["nom"];
    $prenom = $_GET["prenom"];
    $genre = $_GET["sexe"];

        if ($genre == "m"){
            $msg = "$nom $prenom est un homme";
        }else if($genre == "f"){
            $msg = "$nom $prenom est une femme";
        }else if ($genre == "a"){
            $msg = "$nom $prenom est neutre";
        }else{
            $msg = "Il y a eu une erreur pendant la soumission du formulaire";
        }

   

}

// Exercice : Ecrire une phrase avec le nom, le prenom et le genre de la personne
// ex : nom prenom, est un homme (si a choisi homme)
// ex : nom prenom, est un femme (si a choisi femme)
// ex : nom prenom, est neutre (si a choisi neutre)


?>





<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>La méthode GET</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <form action="" method="get">
            <div class="conteneurNom">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" />
            </div>
            <div class="conteneurPrenom">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" />
            </div>
            <div class="conteneurGenre">
                <p>Sexe:</p>
                <div class="conteneurMasculin">
                    <label for="masculin">Masculin</label>
                    <input type="radio" name="sexe" value="m" id="masculin" />
                </div>
                <div class="conteneurFeminin">
                    <label for="feminin">Feminin</label>
                    <input type="radio" name="sexe" value="f" id="feminin"/>
                </div>
                <div class="conteneurAutre">
                    <label for="autre">Autre</label>
                    <input type="radio" name="sexe" value="a" id="autre"/>
                </div>
            </div>

            <input type="submit" value="Envoyer!" />

        </form>

        <?= (!empty($msg)) ? "<div><p>$msg</p></div>" : ""; ?>
    
    </body>
</html>







