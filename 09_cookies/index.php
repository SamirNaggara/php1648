<?php 

if (isset($_COOKIE["Langue"])){
    
    switch ($_COOKIE["Langue"]){
        case "fr":
            header("location: francais.php");
            exit();
            break;
        case "es":
            header("location: espagnol.php");
            exit();
            break;
        case "al":
            header("location: allemand.php");
            exit();
            break;
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
        <title>Site preference langue</title>
        <link rel="icon" type="image/png" href="images/fraise.png">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <a href="francais.php" class="btn btn-primary">Français</a>
        <a href="espagnol.php" class="btn btn-info">Espagnol</a>
        <a href="allemand.php" class="btn btn-dark">Allemand</a>

        









        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>







