<?php
/**
 * Description of Produit
 *
 * @author 91GA003
 */
class Produit {
    
    private $ref;
    private $libelle;
    private $prix;
    private $id_categ;
    
    public function __construct($ref = '', $libel = '', $prix = 0) {
        $this->ref = $ref;
        $this->libelle = $libel;
        $this->prix = $prix;
        $this->id_categ = 0;
    }
            
    public function getRef() {
        return $this->ref;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getId_categ() {
        return $this->id_categ;
    }


}
