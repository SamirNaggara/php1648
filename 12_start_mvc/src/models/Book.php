<?php 


class Book extends Db
{
    public static function allBooks(){
        $requete = "SELECT * FROM livre";

        $enregistrement = self::getDb()->prepare($requete);
        
        $enregistrement->execute();

        return $enregistrement->fetchAll(PDO::FETCH_ASSOC);




    }

}