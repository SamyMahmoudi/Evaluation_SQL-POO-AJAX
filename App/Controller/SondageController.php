<?php 

namespace App\Controller;
use App\Model\SondageModel;

class SondageController {


    public function __construct()
    {
       $this->model = new SondageModel();
    }

    public function render()
    {
      // recupere les sondages terminees de l'utilisateur
      $sondages = $this->model->recupSondage();
      // recupere les reponses terminees de l'utilisateur
      $reponses = $this->model->recupReponse();
      // recupere la liste d'amis de l'utilisateur
      $amis = $this->model->emailing();
     
      $already = $this->model->repUsers();
      $this->model->sdgFinish();

      require ROOT."/App/View/SondageView.php";

    }


}