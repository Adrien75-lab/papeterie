<?php
require_once 'entites/Article.class.php';

function ajout() {
    $caddie = unserialize($_SESSION['caddie']);
    $ref = $_GET['ref'];
    
    if (!isset($caddie[$_GET['ref']])) {
/*        $produit = array();
        $produit['ref'] = $_GET['ref'];
        $produit['lib'] = $_GET['libelle'];
        $produit['prix'] = $_GET['prix'];
        $produit['qtt'] = $_GET['qtt'];
*/
        $article = new Article($_GET['ref'], $_GET['libelle'], $_GET['prix'], $_GET['qtt']);
        
        //$caddie[$_GET['ref']] = $produit;
        $caddie[$_GET['ref']] = $article;
    } else {
        //$caddie[$_GET['ref']]['qtt'] += $_GET['qtt'];
        $caddie[$_GET['ref']]->ajoutQuantite($_GET['qtt']);
    }
    
    //$_SESSION['caddie'] = $caddie;
   $_SESSION['caddie'] = serialize($caddie);
}

function getCaddie(){
    //return $_SESSION['caddie'];
    return unserialize($_SESSION['caddie']);
}

function getTotal() {
    
    $total = 0;
    $caddie = getCaddie();
    foreach ($caddie as $article) {
        $total += $article->getPrix() * $article->getQuantite();
    }
    
    return $total;
}