<?php 

use App\Controller\ProfilController;
use App\Controller\AccueilController;
use App\Controller\InscriptionController;

if(array_key_exists("page",$_GET))
{
    switch ($_GET["page"]) {
        case 'profil' :
            $controller = new ProfilController();
            $controller->profil();
            break;
        case 'inscription' :
            $controller = new InscriptionController();
            $controller->inscrire();
            break;
    }
} else {
    $controller = new  AccueilController();
    $controller->accueil();
}



