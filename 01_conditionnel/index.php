<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Conditionnel</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        
        <?php 
        
        $marteau = true;

        
        if ($marteau){
            echo "<p>Le bruit est trop relou</p>";
        }else{?>
            
            
            <p>Le silence est apréciable !!</p>
            <?php
        }

        $msgError = "" ;

        if (!$msgError){
            echo "<p>Il y a une erreur, et cette erreur est $msgError</p>";
        }else{
            echo "<p>il n'y pas de message d'erreur</p>";
        }

        // En php le et, c'est AND ou &&
        // En php le ou, c'est OR ou ||


        // OU
        // true Ou true = true
        // false ou true = true
        // true ou false = true
        // false ou false = false 

        // Ou exclusif en php, c'est le XOR
        // true Ou true = false
        // false ou true = true
        // true ou false = true
        // false ou false = false 

        // Le ! inverse le bouleen
        
        
        // Switch en php


        $nombre = 1;

        switch($nombre){
            case 0:
                echo "<p>La variable test est égal à 0</p>";
                break;
            case 1:
                echo "<p>La variable test est égal à 1</p>";
                break;
            case 2:
                echo "<p>La variable test est égal à 2</p>";
                break;
            case 3:
                echo "<p>La variable test est égal à 3</p>";
                break;
            default:
                echo "<p>Le nombre n'est pas compreis entre 0 et 3</p>";
        }

        

        ?>














    </body>
</html>







