<?php 

function debug(array $liste){
    echo "<pre>";
    print_r($liste);
    echo "</pre>";
}


function mailOk(string $mail):bool{

    if (empty($mail)){
        return false;
    }

    if (strlen($mail)<=4 || strlen($mail)>150){
        return false;
    }

    return true;

}


function passwordFormatOk(string $mdp):bool{

    if (empty($mdp)){
        return false;
    }

    return true;

}

function nomOk(string $nom):bool{

    if (empty($nom)){
        return false;
    }

    return true;

}

function prenomOk(string $prenom):bool{

    if (empty($prenom)){
        return false;
    }

    return true;

}

function adresseOk(string $adresse):bool{

    if (empty($adresse)){
        return false;
    }

    return true;

}

function imageOk(array $listePhoto):bool{

    // On verifie si le type de la photo est dans la liste des formats autorisee dans le init
    global $formatAutorisee;
    if (!in_array($listePhoto["type"],$formatAutorisee)){
        return false;
    }
   


    return true;
}


function mailExiste(string $mail):bool{
    global $dbh;

    $requete = "SELECT * FROM abonne WHERE mail = :mail";

    $enregistrement = $dbh->prepare($requete);

    $enregistrement->bindParam(":mail", $mail, PDO::PARAM_STR);

    if ($enregistrement->execute()){
        if ($enregistrement->rowCount()){
            return true;
        }  
    }
    return false;
}

function is_connect(){
    if (isset($_SESSION["utilisateur"])){
        return true;
    }
    return false;
}




// Creer une fonction qui renvoie true si la personne connectée est admin

function is_connect_admin(){
    if (!is_connect()){
        return false;
    }

    if ($_SESSION["utilisateur"]["statut"] != 1){
        return false;
    }

    return true;
}


