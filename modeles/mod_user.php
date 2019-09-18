<?php
require 'dao/dao.php';

function connect() {
    $ident = $_POST['ident'];
    $psw = $_POST['psw'];
// vérification en base
    $pdo = new MonPDO();
    $listeUser = $pdo->verifUser($ident, $psw);
    if (count($listeUser) == 1) {
        $user = $listeUser[0];
    } else {
        $user = false;
    }
    return $user;
}

function deConnect() {
    session_destroy();
}

function creerUser() {
    // récupération des paramètre du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ident = $_POST['ident'];
    $psw = $_POST['psw'];
    $role = 'client';
    // vérification en base
    $pdo = new MonPDO();
    $retour = $pdo->newClient($nom, $prenom, $ident, $psw, $role);
    return $retour;
}