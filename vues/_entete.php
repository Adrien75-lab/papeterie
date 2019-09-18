<?php
/**
 * @author Didier Bonneau
 * @copyright (c) Afpa, DWWM
 * @version 1.0 du 01/04/2019
 * Fichier d'entête de l'application TP_Papeterie
 */
?>
<header class="container-fluid bg-dark text-white">
    <div class="row">
        <div class="col-1">
            <img src="images/logo_papeterie.png" alt="logo">
        </div>
        <div class="col-8">
            <h3>Papeterie du Centre</h3>
            <p>9 rue Marc Seguin<br>
                94000 Créteil<br>
                Tél : 01 23 45 67 89</p>
        </div>
        <div class="col-3">
            <?php
            if (!$connect) {
                ?>   
                <span>Déjà client : <a href="index.php?modele=user&action=connect" class="btn btn-primary btn-sm">Identifiez-vous</a></span>
                <br>
                <span><a href="index.php?modele=user&action=newClient" class="btn btn-secondary btn-sm">Créer un compte</a></span>
                <?php
            } else {
                echo '<span>Bienvenue ' . $_SESSION['nom_user'] . ' '. $_SESSION['prenom_user']. ' : '
                ?>
                <a href="index.php?modele=user&action=deConnect" class="btn btn-primary btn-sm">Déconnection</a></span>
                <?php
            }
            ?>
            <br>
            <span class="badge badge-secondary">DATE : <?php echo date("d.m.Y") ?></span></p>
        </div>
    </div>
</header>
