<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fonctions</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
    
        <?php 

        $liste = ["rouge", "vert", "bleu"];

        // Creez une fonction qui renvoie directement le debug de la liste
        // On appelera cette fonction debug

        function debug(array $liste) : bool{
            echo "<pre>";
            print_r($liste);
            echo "</pre>";

            return true;

        }

        $resultat = debug($liste);


        // Creez une fonction qui prends en argument un prix ht, et qui renvoie le prix majoré de 20%
        // prix = prix-ht *(20/100)

        function tva(int $pvht){
            $ttc = $pvht * 1.2;

            return $ttc;
        }

        function tva2(int $pvht, int $taux=20){
            return ($pvht * $taux/100) + $pvht;
        }

        $resultat1 = tva2(100);
        $resultat2 = tva2(100,5.5);

    ?>
    </body>
</html>







