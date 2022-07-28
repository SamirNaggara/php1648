<?php 


class UserController
{
    public static function inscription(){

        $title = "Page d'inscription";
        
        if (!empty($_POST)){
            User::mailOk($_POST["email"]);

            $mdpHache = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

            if (empty($_SESSION["erreurs"])){
                User::insertUser([
                    "email" =>  $_POST["email"],
                    "nom" =>  $_POST["nom"],
                    "prenom" =>  $_POST["prenom"],
                    "adresse" =>  $_POST["adresse"],
                    "mdp"       => $mdpHache,
                    "photo"     =>  ""

                ]);
            }




        }

        include VIEWS . "user/inscription.php";
    }
}