<?php 

namespace App\Controller;
use App\Model\DisconnectModel;

/**
 *  class DisconnectController utilise la function  public function __construct() 
 *        et la function public function render()
 */
class DisconnectController {

     /**
   * la fonction __construct éxécute DisconnectModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new DisconnectModel();
    }

    public function render()
    {
        //deconnecte l'utilisateur
        $this->model->disconnect();

        //template page Accueil
        require ROOT."/App/View/AccueilView.php";
    }

}