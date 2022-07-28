<?php 


class BookController
{
    public static function liste_livres(){
        $title = "Liste des Livres";

        $books = Book::allBooks();

        include VIEWS . "book/listeLivre.php";
    }
}