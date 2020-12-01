<?php 

namespace App\Controller;

use App\Model\SondageModel;
/**
 *  class SondageController utilise la function  public function __construct() 
 *        et la function public function render()
 */
class SondageController {

 /**
   * la fonction __construct éxécute SondageModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new SondageModel();
    }

    public function render()
    {
      //recupere le sondage et affiche le sondage
     $sondages = $this->model->recupSondage();

     //recupere les reponses et les affiches 
     $reponses = $this->model->recupReponse();
     
     // envoie un mail aux amis
     $amis = $this->model->emailing();

      //template page sondage
      require ROOT."/App/View/SondageView.php";

    }


}