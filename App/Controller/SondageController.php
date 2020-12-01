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

    /**
     * contient tous les fonctions de la page sondage
     *
     * @return void
     */
    public function render()
    {
      // recupere les sondages terminees de l'utilisateur
      $sondages = $this->model->recupSondage();

      // recupere les reponses terminees de l'utilisateur
      $reponses = $this->model->recupReponse();

      // recupere la liste d'amis de l'utilisateur
      $amis = $this->model->emailing();

      $this->model->saveTchat();
      // $this->model->refreshTchat();
     
      $already = $this->model->repUsers();
      $this->model->sdgFinish();

      //template page sondage
      require ROOT."/App/View/SondageView.php";

    }


}