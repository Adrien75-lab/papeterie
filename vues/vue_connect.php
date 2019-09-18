<main class="container">
    <div id="wrap">
        <h1>Page d'identification</h1>
        <br />
        <p><?php echo $message; ?></p>
        <br />
        <form method="post" action="index.php?modele=user&action=verifConnect">
            <label for="idIdent">Votre identifiant : </label>
            <input type="text" id="idIdent" name="ident" />
            <label for="idPsw"> Votre mot de passe : </label>
            <input type="password" id="idPsw" name="psw" />
            <br /><br />
            <input type="submit" value="Envoyer" />
        </form>
    </div>
</main>
