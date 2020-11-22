<?php 

namespace App\Controller;
use App\Model\ConnexionModel;


class ConnexionController {

    public function __construct()
    {
       $this->model = new ConnexionModel();
    }

    public function Connexion()
    {
      $this->model->Searchconnexion(); 
      require ROOT."/App/View/ConnexionView.php";
    }
}