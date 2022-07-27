<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Web tutorials" />
        <meta name="keywords" content="HTML,CSS,JavaScript" />
        <meta name="author" content="Code Your Life" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Mails en PHP</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <?php

        $destinataire = "samirm.nagg@gmail.com";
        $objet = "Ceci est le sujet du mail";
        $contenu = "<p style=\"font-size:30px;text-align:center\">Ceci est le contenu de mon mail</p>";
        $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($destinataire, $objet, $contenu, $headers)){
            echo "Le mail a correctement été envoyé à $destinataire";
        }
        ?>

    </body>
</html>







