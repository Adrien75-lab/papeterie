<?php
/**
 * @author Didier Bonneau
 * @copyright (c) Afpa, DWWM
 * @version 1.0 du 01/04/2019
 * Fichier du menu de l'application TP_Papeterie
 */
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <!-- Dropdown -->
            <li class="nav-item <?php if ($page == "produit") {echo "active";} ?>">
                <a class="nav-link" href="index.php?modele=produit&action=liste&categorie=1">Les produits</a>
            <li class="nav-item <?php if ($page == "promos") {echo "active";} ?>">
                <a class="nav-link" href="#">Les Bonnes affaires</a>
            </li>
            <li class="nav-item <?php if ($page == "panier") {echo "active";} ?>">
                <a class="nav-link <?php if (!$connect) {echo 'disabled';}?>" href="index.php?modele=caddie&action=liste">Votre panier</a>
            </li>
        </ul>
    </div>
</nav>
