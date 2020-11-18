<?php 

use App\Controller\ProfilController;
use App\Controller\AmisController;
use App\Controller\AccueilController;
use App\Controller\InscriptionController;

if(array_key_exists("page",$_GET))
{
    switch ($_GET["page"]) :

        case 'profil':
            $controller = new ProfilController();
            $controller->render();
            break;
        case 'amis':
            $controller = new AmisController();
            $controller->render();
            //$controller->SearchFriends();
            break;
        case 'inscription' :
            $controller = new InscriptionController();
            $controller->inscrire();
            break;
            
            default:
            $controller = new  AccueilController();
            $controller->render();
        endswitch;

} else {
    $controller = new  AccueilController();
    $controller->render();
}





