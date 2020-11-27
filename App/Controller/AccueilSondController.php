<?php 

namespace App\Controller;
use App\Model\AccueilSondModel;

class AccueilSondController {


    public function __construct()
    {
       $this->model = new AccueilSondModel();
    }

    public function render()
    {
      $sondages = $this->model->recupSond();

      require ROOT."/App/View/AccueilSondView.php";

    }


}