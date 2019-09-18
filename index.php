<?php
session_start();
$connect = isset($_SESSION['nom_user']);
if (!isset($_SESSION['caddie'])) {
   $_SESSION['caddie'] = array();
}

if (isset($_GET['modele']) && isset($_GET['action'])) {
    $modele = $_GET['modele'];
    $action = $_GET['action'];
} else {
    $modele = 'user';
    $action = 'accueil';
}

switch ($modele) {
    case 'user':
        switch ($action) {
            case 'accueil':
                render('accueil');
                break;
            case 'connect':
                // clic sur le bouton identifiez-vous
                render('connect');
                break;
            case 'verifConnect':
                // soumission du formulaire de connexion
                include 'modeles/mod_user.php';
                $user = connect();
                if ($user == false) {
                    // utilisateur non trouvé en base
                    $param['message'] = 'identification ou mot de passe non valide';
                    render('connect', $param);
                } else {
                    // utilisateur trouvé
                    $_SESSION['nom_user'] = $user['nom'];
                    $_SESSION['prenom_user'] = $user['prenom'];
                    $_SESSION['role_user'] = $user['role'];
                    $connect = true;
                    render('accueil');
                }
                break;
            case 'deConnect':
                // clic sur bouton de déconnexion
                include 'modeles/mod_user.php';
                deConnect();
                $connect = false;
                render('accueil');
                break;
            case 'newClient':
                if (!isset($_POST['ident'])){
                    // clic sur bouton créer un compte
                    render('newClient');
                } else {
                    // soumission du formulaire : verif du nouveau client
                    include 'modeles/mod_user.php';
                    //require 'dao/dao.php';
                    $ok = creerUser();
                    if ($ok == 1) {
                        // l'utilisateur a été inséré en base
                        $_SESSION['nom_user'] = $_POST['nom'];
                        $_SESSION['prenom_user'] = $_POST['prenom'];
                        $_SESSION['role_user'] = 'client';
                        $connect = true;
                        render('accueil');
                    } else {
                        // le login et mot de passe existent déjà
                        $param['message'] = 'Identifiant ou mot de passe existant';
                        render('newClient', $param);
                    }
                }
                break;
            default:
                render('accueil');
                break;
        }
 
        break;

    case 'produit':
        switch ($action) {
            case 'liste':
                include 'modeles/mod_categorie.php';
                $param['listeCategorie'] = getCategorie();
                include 'modeles/mod_produit.php';
                $param['listeProduit'] = getProduits();
                render('produit', $param);
                break;

            default:
                render('accueil');
                break;
        }
        break;

    case 'caddie':
        switch ($action) {
            case 'liste':
                include 'modeles/mod_caddie.php';
                $param['caddie'] = getCaddie();
                $param['total'] = getTotal();
                render('caddie', $param);
                break;
            
            case 'ajout':
                include 'modeles/mod_caddie.php';
                ajout();
                header('Location: index.php?modele=produit&action=liste&categorie='.$_GET['categorie']);
                break;
            
            default:
                render('accueil');
                break;
        }
        break;

    default:
        render('accueil');
        break;
}

function render($page, $parametres = array('message' => '')) {
    global $connect;
    extract($parametres);
    $vue = 'vues/vue_'.$page.'.php';
    include 'vues/template.php';
}
?>
