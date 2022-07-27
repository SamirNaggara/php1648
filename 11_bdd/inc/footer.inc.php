        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <footer></footer>
        <!-- Modal -->
        <!-- Modal -->
        <form action="<?=URL?>/traitement/traitement-connexion.php" method="post">
            <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="modalConnexionLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= (isset($_POST["email"])) ? $_POST["email"] : ""?>">
                                <div id="emailHelp" class="form-text">Votre adresse email</div>
                            </div>
                            <div class="mb-3">
                                <label for="mdp" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="mdp" name="mdp" value="<?= (isset($_POST["mdp"])) ? $_POST["mdp"] : ""?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>