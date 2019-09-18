<?php
require_once 'dao/dao.php';

function getCategorie() {
    
    $pdo = new MonPDO();
    
    $categories = $pdo->getAllCategorie();
    
    return $categories;
}
