<?php  include VIEWS.'inc/header.php'; ?>

    <h1 class="text-center my-5">Inscription</h1>
    <form action="" method="post" class="container w-75 mw-auto" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= (isset($_POST["email"])) ? $_POST["email"] : ""?>">
            <div id="emailHelp" class="form-text">Votre adresse email</div>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" value="<?= (isset($_POST["mdp"])) ? $_POST["mdp"] : ""?>">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" aria-describedby="nomHelp" name="nom" value="<?= (isset($_POST["nom"])) ? $_POST["nom"] : ""?>">
            <div id="nomHelp" class="form-text">Votre Nom</div>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom" aria-describedby="prenomHelp" name="prenom" value="<?= (isset($_POST["prenom"])) ? $_POST["prenom"] : ""?>">
            <div id="prenomHelp" class="form-text">Votre Prenom</div>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse Postale</label>
            <input type="text" class="form-control" id="adresse" aria-describedby="adresseHelp" name="adresse" value="<?= (isset($_POST["adresse"])) ? $_POST["adresse"] : ""?>">
            <div id="adresseHelp" class="form-text">Votre Adresse Postale</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="confidentialite" name="confidentialite" value="ok">
            <label class="form-check-label" for="confidentialite">J'accepte les politiques de confidentialités</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inscriptionPhoto" name="photo">
            <label class="input-group-text" for="inscriptionPhoto">Photo de profil</label>
        </div>
        <button type="submit" class="btn btn-primary">Je m'inscris</button>
    </form>
<?php  include VIEWS.'inc/footer.php'; ?>