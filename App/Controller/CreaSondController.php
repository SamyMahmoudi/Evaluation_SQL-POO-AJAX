<?php 

namespace App\Controller;
use App\Model\CreaSondModel;

class CreaSondController {


    public function __construct()
    {
       $this->model = new CreaSondModel();
    }

    public function CreaSond()
    {

      require ROOT."/App/View/CreaSondView.php";
      $this->model->CreaSondage();

    }


}