<?php
require_once 'entites\Produit.php';
/**
 * Description of Article
 *
 * @author Didier
 */
class Article extends Produit {
    
    private $quantite;
    
    public function __construct($ref, $libelle, $prix, $qtt) {
        
        parent::__construct($ref, $libelle, $prix);
        $this->quantite = $qtt;
    }
    
    public function getQuantite(){
        return $this->quantite;
    }
    
    public function ajoutQuantite($qtt){
        $this->quantite += $qtt;
    }
}
