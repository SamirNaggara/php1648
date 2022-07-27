<?php 

    include("inc/init.inc.php");
    include("inc/functions.inc.php");

    if (!is_connect()){
        $_SESSION["erreur"] = "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Attention, la liste des livres n'est accessible qu'aux membres connectés
      </div>";
        header("Location:" . URL);
        exit();
    }


    $title .= " - Liste Livres";

    $requete = "SELECT * FROM livre"; 

    $enregistrement = $dbh->prepare($requete); 

    $resultat = $enregistrement->execute();

    if ($resultat){ // Si la requete a fonctionnée
        // On extrait les données de enregistrement a l'aide d'un fetchAll, et on les stocks dans utilisateur
        // (Un fetch permet d'extraire une seule ligne à la fois)
        $livres = $enregistrement->fetchAll(PDO::FETCH_ASSOC);
    
    }

    include("inc/head.inc.php");
    include("inc/header.inc.php");
?>


<main>
    <h1 class="text-center my-5">Liste des livres</h1>
    <table class="table table-striped w-50 mx-auto">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Auteur</th>
                <th scope="col">Titre du livre</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($livres as $livre){
                ?>
                    <tr>
                        <td><?= $livre["id_livre"]?></td>
                        <td><?= ucfirst($livre["auteur"])?></td>
                        <td><?= $livre["titre"]?></td>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</main>

    

<?php

    include("inc/footer.inc.php");