<?php 

use App\Controller\SondageController;
use App\Controller\AmisController;
use App\Controller\ProfilController;
use App\Controller\AccueilController;
use App\Controller\CreaSondController;
use App\Controller\ConnexionController;
use App\Controller\AccueilSondController;
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
        case 'connexion'  :
            $controller = new ConnexionController();
            $controller->Connexion();
            break;
        case 'Connexion_login_err_password'  :
            $controller = new ConnexionController();
            $controller->Connexion();
            break;
        case 'Connexion_login_err_already'  :
            $controller = new ConnexionController();
            $controller->Connexion();
            break;
        case 'creaSondage'  :
            $controller = new CreaSondController();
            $controller->CreaSond();
            break;
        case 'accueilSondage'  :
            $controller = new AccueilSondController();
            $controller->render();
            break;
            case 'sondage'  :
                $controller = new SondageController();
                $controller->render();
                break;
            
            
            default:
            $controller = new  AccueilController();
            $controller->render();
        endswitch;

} else {
    $controller = new  AccueilController();
    $controller->render();
}





