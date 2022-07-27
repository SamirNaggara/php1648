<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Valentin !</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <form action="lettre.php" method="get">
        <div class="conteneurNom">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" />
        </div>
        <div class="conteneurChoix">
            <label for="choix">Amour ou haine ?</label>

            <select name="choix" id="choix">
                <option value="">Choisissez votre style de lettre</option>
                <option value="haine">Lettre de haine</option>
                <option value="amour">Lettre d'amour</option>
            </select>

            <input type="submit" value="Je veux la lettre">
        </div>
    </body>
</html>