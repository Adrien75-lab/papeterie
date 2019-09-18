<?php

require 'entites/Produit.php';
require 'entites/Categorie.class.php';

class MonPDO {

    const IP = 'localhost';
    const DB_NAME = 'papeterie';
    const USER = 'root';
    const PSW = '';
    
    private $PDO_connect;
    
    public function __construct() {
        
        $this->PDO_connect = new PDO('mysql:host='. self::IP.';dbname='.self::DB_NAME.
                ';charset=utf8', self::USER, self::PSW) ;
        
    }
    
    public function getProduitByCategorie($categ) {
    
        $sql = 'SELECT * FROM t_produits WHERE id_categ='.$categ;

        $PDO_Stat = $this->PDO_connect->query($sql);

        $liste =  $PDO_Stat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Produit');
        return $liste;
    }

    public function getAllCategorie(){

        $sql = 'SELECT * FROM t_categorie';

        $PDO_Stat = $this->PDO_connect->query($sql);

        $liste =  $PDO_Stat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categorie');

        return $liste;

    }

    public function verifUser($login, $psw){
        $utilisateur = array();

        $sql = 'SELECT * FROM `t_users` WHERE `login`=\''.$login.'\' AND `psw`=\''.$psw.'\';';

        $PDO_Stat = $this->PDO_connect->query($sql);

        $utilisateur =  $PDO_Stat->fetchAll(PDO::FETCH_ASSOC);


        return $utilisateur;
    }

    public function newClient($nom, $prenom, $ident, $psw, $role) {
        $result = 0;

        $retour = $this->verifUser($ident, $psw);

        if (count($retour) == 0) {
            $sql = 'INSERT INTO `t_users` (`id_user`, `nom`, `prenom`, `login`, `psw`, `role`)'
                    . ' VALUES (NULL, \''.$nom.'\', \''.$prenom.'\', \''.$ident.'\', \''.$psw.'\', \''.$role.'\');';

            $result = $this->PDO_connect->exec($sql);
        }
        return $result;
    }

}