<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Listes en PHP</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
       <?php 

        $liste = array("pomme", "poire", "kiwi", "banane");
        $liste2 = ["courgette", "carotte", "oignon","pomme de terre"];

        echo $liste[1];

        // Pour visualiser la liste dans son ensemble, 2 méthodes
        echo "<pre>";
        print_r($liste);
        echo "</pre>";

        echo "<pre>";
        var_dump($liste);
        echo "</pre>";

        // Ajouter un élément à la fin d'une liste
        $liste[] = "fraise";

        echo "<pre>";
        print_r($liste);
        echo "</pre>";

        echo count($liste) . "<br>";
        echo sizeof($liste) . "<br>";


        $couleurHexa = array(
            "rouge"     =>      "FF0000",
            "vert"      =>      "00FF00",
            "bleu"      =>      "0000FF",
            "violet"    =>      "FF00FF"
        );

        echo "<pre>";
        print_r($couleurHexa);
        echo "</pre>";

        

        ?>
        <div style="height:200px;background-color:#<?= $couleurHexa["rouge"]; ?>"></div>
        <?php

        /* BOUCLE WHILE
        
        Exercice : A l'aide d'une boucle while, afficher tout les elements de la liste de fruit
        pomme
        fraise
        banane
        ...

        */
        $i=0;
        while($i<count($liste)){
            echo $liste[$i] ."<br>";

            $i++;
        }
        // Reecrire la boucle de dessus en utilisant cette fois une boucle for
        for($i=0;$i<count($liste);$i++){
            echo $liste[$i] . "<br>";
        }

        // $liste[0]
        // $liste[1]
        // $liste[2]
        // $liste[3]
        // $liste[4]
        // ..
        // $liste[n-1]
     

        /*
        
        Faire pareil en affichant les valeurs des couleurs hexa, avec le diese
        #FF0000
        #00FF00
        #0000FF
        ...

        */

        $couleurHexa2 = array_values($couleurHexa);
        $i=0;
        while($i<count($couleurHexa2)){
            echo "#" . $couleurHexa2[$i] ."<br>";

            $i++;
        }
        // print_r($couleurHexa2);

        /*
        
        Et enfin, afficher la clé des valeurs hexa, et la valeur correspondante
        rouge -> #FF0000
        vert -> #00FF00
        bleu -> #0000FF
        ..

        */



        $cleCouleurHexa = array_keys($couleurHexa);

        print_r($cleCouleurHexa);

        $i=0;
        while($i<count($cleCouleurHexa)){
            echo $cleCouleurHexa[$i] . " -> #" . $couleurHexa[$cleCouleurHexa[$i]] . "<br>";
            $i++;
        }

        // Maintenant, refaire cet énoncé, avec un foreach


        foreach($couleurHexa as $cle => $valeur){
            echo "$cle ->#$valeur<br>";
        }
        


        /*


        1
        23
        456
        78910
        1112131415
        ...

        */








    ?>





    </body>
</html>







