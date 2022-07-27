<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cookies</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <?php 
            echo time();
            setcookie("nom_du_cookie", "valeur du cookie", time() + 60*60*24*90);

            // L'expiration du cookie est exprimé en timestamp. C'est le nombre de secondes écoulés entre le 1er Janvier 1970 et le moment choisis
            // ici, on demande l'expiration du cookie pour 3 mois après, soit 60 seconde * 60 minutes * 24 heures * 90 jours


            echo "<pre>";
            print_r($_COOKIE);
            echo "</pre>";


            echo $_COOKIE["nom_du_cookie"];


        ?>










    </body>
</html>







