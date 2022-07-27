<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=URL?>">My Bibli</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=URL?>">Accueil</a>
                    </li>
                    <?php 
                    if (!is_connect()){
                        ?>
                            <li clasZs="nav-item">
                                <a class="nav-link" href="<?=URL?>/inscription.php">Inscription</a>
                            </li>
                    <?php } ?>
                    <?php if (is_connect_admin()){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=URL?>/ajout-livre.php">Ajout Livre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=URL?>/admin/liste-abonnes.php">Liste abonnés</a>
                        </li>
                    <?php } ?>
                    
                    <?php 
                        if (is_connect()){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=URL?>/liste-livres.php">Liste livres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=URL . "?action=deconnexion"?>">Deconnexion</a>
                            </li>
                    <?php } ?>
                    <?php 
                        if (!is_connect()){
                            ?>
                            <li class="nav-item">
                                <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalConnexion">
                                    Se connecter
                                </button>
                            </li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <?= $msg; ?>
        <?= isset($_SESSION["erreurs"]) ? $_SESSION["erreurs"] : ""; 
            $_SESSION["erreurs"] = "";
        ?>

    </div>
</header>