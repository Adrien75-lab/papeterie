<?php
require_once 'dao/dao.php';

function getProduits(){
    
    $pdo = new MonPDO();
    $categorie = $_GET['categorie'];
    $listeProduit = $pdo->getProduitByCategorie($categorie);
    
    return $listeProduit;
}
