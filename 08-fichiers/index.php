<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fichiers</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    
        <?php

            // Ecrire dans un fichier texte

            $f = fopen("sauvegarder.txt","a+");

            fwrite($f,"Je suis une ligne\n");

            fclose($f);

            // Lire un fichier texte

            $fichier = file("sauvegarder.txt");

            echo "<pre>";
            print_r($fichier);
            echo "</pre>";

            foreach($fichier as $cle => $valeur){
                $cle++;
                echo "La ligne $cle contient $valeur<br>";

            }


            // Creez un formulaire qui demande le nom de la personne
            // Récuperez l'infos en back, et stocker dans un fichier. Une ligne, un prenom
            // Afficher en dessus la liste de tout les prenoms





        ?>


    </body>
</html>







