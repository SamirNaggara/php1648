<?php  include VIEWS.'inc/header.php'; ?>

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
            foreach($books as $book){
                ?>
                    <tr>
                        <td><?= $book["id_livre"]?></td>
                        <td><?= ucfirst($book["auteur"])?></td>
                        <td><?= $book["titre"]?></td>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>


<?php  include VIEWS.'inc/footer.php'; ?>