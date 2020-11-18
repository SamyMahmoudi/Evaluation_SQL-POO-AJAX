<?php 

namespace App\Controller;
use App\Model\InscriptionModel;

class InscriptionController {


    public function __construct()
    {
       $this->model = new InscriptionModel();
    }

    public function inscrire()
    {

      require ROOT."/App/View/InscriptionView.php";
      $this->model->inscription();

    }


}