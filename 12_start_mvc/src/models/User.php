<?php 


class User extends Db
{
    public static function mailOk(string $mail){
        if (empty($mail)){
            $_SESSION["erreurs"] .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, votre mail est vide
          </div>";
            return false;
        }
    
        if (strlen($mail)<=4 || strlen($mail)>150){
            $_SESSION["erreurs"] .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            Attention, votre mail doit être compris entre 4 et 150 caracteres
          </div>";
            return false;
        }
    
        return true;
    
    }

    public static function insertUser(array $info){
        $requete = "INSERT INTO abonne (prenom, nom, mail, adresse, mdp, photo) VALUES (:prenom,:nom,:email,:adresse,:mdp,:photo)";

        $requetePreparee = self::getDb()->prepare($requete);

        $requetePreparee->bindParam(":prenom", $info["prenom"], PDO::PARAM_STR);
        $requetePreparee->bindParam(":nom", $info["nom"], PDO::PARAM_STR);
        $requetePreparee->bindParam(":email", $info["email"], PDO::PARAM_STR);
        $requetePreparee->bindParam(":adresse", $info["adresse"], PDO::PARAM_STR);
        $requetePreparee->bindParam(":mdp", $info["mdp"], PDO::PARAM_STR);
        $requetePreparee->bindParam(":photo", $info["photo"], PDO::PARAM_STR);

        // Si la requete fonctionne bien, et qu'une ligne a été ajouté
        if ($requetePreparee->execute() && $requetePreparee->rowCount() == 1){
            $_SESSION["erreurs"] .= "<div class=\"alert alert-success w-50 mx-auto mt-5\" role=\"alert\">
            Bravo, votre inscription a bien été prise en compte
          </div>";
          return true;
        }else{
            $_SESSION["erreurs"] .= "<div class=\"alert alert-warning w-50 mx-auto mt-5\" role=\"alert\">
            L'inscription ne s'est effectué normalement dans la bdd
          </div>";
          return false;
        }
        

    }
}