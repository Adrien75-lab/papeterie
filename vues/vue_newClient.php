<main class="container">
    <p class="h2">Création d'un compte</p>
    <br>
    <p><?php if(isset($message)){ echo $message;} ?></p>
    <br>
    <form method="post" action="index.php?modele=user&action=newClient">
        <label for="id_nom">Votre nom :&nbsp;</label><input type="text" <?php if (isset($_POST['nom'])) {
                                                                                    echo 'value="' . $_POST['nom'] . '" ';
                                                                                } ?>name="nom" id="id_nom"><br>
        <label for="id_prenom">Votre prénom :&nbsp;</label><input type="text" name="prenom" id="id_prenom"><br>
        <label for="id_ident">Votre identifiant :&nbsp;</label><input type="text" name="ident" id="id_ident"><br>
        <label for="id_psw">Votre mot de passe :&nbsp;</label><input type="password" name="psw" id="id_psw"><br>
        <br>
        <button type="submit">Valider</button>
    </form>
</main>
