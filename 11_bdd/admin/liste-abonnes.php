<?php 

include("../inc/init.inc.php");
include("../inc/functions.inc.php");

if (!is_connect_admin()){
    $_SESSION["erreur"] = "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Attention, la liste des abonnés n'est accessible qu'aux administrateurs
      </div>";
    header("Location:".URL);
    exit();
}


// Suppression d'un abonné

if (isset($_GET["action"]) && $_GET["action"] == "suppression" && isset($_GET["id"])){



    $requete = "DELETE FROM abonne WHERE id_abonne = :id";

    $requetePreparee = $dbh->prepare($requete);

    $requetePreparee->bindParam(":id", $_GET["id"], PDO::PARAM_INT);

    $resultat = $requetePreparee->execute();

    if ($requetePreparee->rowCount()){ // Renvoie le nombre de lignes affectées par la requetes
        $msg .= "<div class=\"alert alert-success w-50 mx-auto mt-5\" role=\"alert\">
        Le membre a bien été supprimé
      </div>";
    }else{
        $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        La suppression demandé n'a pas marché
      </div>";
    }
}

if (isset($_GET["action"]) && $_GET["action"] == "nommer_admin" && isset($_GET["id"])){
    $requete = "UPDATE `abonne` SET statut=1 WHERE id_abonne = :id";

    $requetePreparee = $dbh->prepare($requete);

    $requetePreparee->bindParam(":id", $_GET["id"], PDO::PARAM_INT);

    $resultat = $requetePreparee->execute();

    if ($requetePreparee->rowCount()){ // Renvoie le nombre de lignes affectées par la requetes
        $msg .= "<div class=\"alert alert-success w-50 mx-auto mt-5\" role=\"alert\">
        Le membre a bien été nommé admin
      </div>";
    }else{
        $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Une erreur est survenu
      </div>";
    }
}


if (isset($_GET["action"]) && $_GET["action"] == "retirer_admin" && isset($_GET["id"])){
    $requete = "UPDATE `abonne` SET statut=0 WHERE id_abonne = :id";

    $requetePreparee = $dbh->prepare($requete);

    $requetePreparee->bindParam(":id", $_GET["id"], PDO::PARAM_INT);

    $resultat = $requetePreparee->execute();

    if ($requetePreparee->rowCount()){ // Renvoie le nombre de lignes affectées par la requetes
        $msg .= "<div class=\"alert alert-success w-50 mx-auto mt-5\" role=\"alert\">
        Le membre a bien été retiré des admins
      </div>";
    }else{
        $msg .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
        Une erreur est survenu
      </div>";
    }
}



$requete = "SELECT * FROM abonne"; 


$enregistrement = $dbh->prepare($requete); // On prépare la requete

$resultat = $enregistrement->execute(); // On execute la requete

if ($resultat){ // Si la requete a fonctionnée
    // On extrait les données de enregistrement a l'aide d'un fetchAll, et on les stocks dans utilisateur
    // (Un fetch permet d'extraire une seule ligne à la fois)
    $utilisateurs = $enregistrement->fetchAll(PDO::FETCH_ASSOC);

}

// debug($utilisateurs);


include("../inc/head.inc.php");
include("../inc/header.inc.php");

?>

<main>
    <h1 class="text-center my-5">Liste des abonnés</h1>
    <table class="table table-striped w-50 mx-auto text-center" id="liste_abonnes">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Mail</th>
                <th scope="col">Statut</th>
                <th scope="col" colspan="2">Actions</th>
            </tr>
        </thead>
            <tbody>
                <?php
                    foreach($utilisateurs as $utilisateur){
                        ?>
                            <tr>
                                <td><?= $utilisateur["id_abonne"]?></td>
                                <td><?= ucfirst($utilisateur["prenom"])?></td>
                                <td><?= $utilisateur["nom"]?></td>
                                <td><?= $utilisateur["mail"]?></td>
                                <td><?= $utilisateur["adresse"]?></td>
                                <td><?= ($utilisateur["statut"] == 1) ? "Admin" : "";?></td>
                                <td>
                                    <a href="?action=suppression&id=<?=$utilisateur["id_abonne"]?>" class="btn btn-danger">Supprimer</a>
                                </td>
                                <td>
                                    <?php 
                                        if ($utilisateur["statut"] == 1){
                                            ?>
                                            <a href="?action=retirer_admin&id=<?=$utilisateur["id_abonne"]?>" class="btn btn-warning">Retirer des admin</a>
                                            <?php
                                        }else{
                                            ?>
                                            <a href="?action=nommer_admin&id=<?=$utilisateur["id_abonne"]?>" class="btn btn-success">Nommer admin</a>
                                            <?php
                                        }
                                    ?>
                                    
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </main>

<?php



include("../inc/footer.inc.php");