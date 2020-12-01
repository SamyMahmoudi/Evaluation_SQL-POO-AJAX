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
      $sondagesFriends = $this->model->recupSondFriends();
      $sondagesUser = $this->model->recupSondUser();
      require ROOT."/App/View/AccueilSondView.php";
    }
}