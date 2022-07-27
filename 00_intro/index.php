<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Base d'une page</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <?php /* J'ouvre la balise php*/?>

        <?php echo "<p>Hello World !</p>"; ?>
        <?= "<p>Hello World 2!</p>"; /* Cette ligne est exactement similaire a la ligne précédente*/ ?>


        <?php // phpinfo(); ?>

        <?php $variable = true; ?>

        <?= $variable  . "<br>"?>

        <?= gettype($variable)  . "<br>"; ?>

        <?php define("CAPITAL_FRANCE", "Paris") ;
            const CAPITAL_ALLEMAGNE = "Berlin";

            // Deux façons de déclarer des constates


            // En PHP, la concatenation se fait avec .


            $nombre = 3;
            $phrase = "Ceci est le nombre ";

            echo $phrase . $nombre . "<br>";

            echo "<p>Nombre est égal à $nombre</p>";
            echo '<p>Nombre est égal à $nombre</p>';
        ?>















    </body>
</html>







