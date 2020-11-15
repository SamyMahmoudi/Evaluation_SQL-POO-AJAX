<?php 

use App\Controller\ProfilController;
use App\Controller\AccueilController;

if(array_key_exists("page",$_GET))
{
    switch ($_GET["page"]) {
        case 'profil' || 'profil_erreur':
            $controller = new ProfilController();
            break;
    }
} else {
    $controller = new  AccueilController();
}


$controller->render();