<?php 

namespace App\Controller;
use App\Model\CreaSondModel;

/**
 *  class CreaSondController utilise la function  public function __construct() 
 *        et la function public function CreaSond()
 */
class CreaSondController {

   /**
   * la fonction __construct éxécute CreaSondModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new CreaSondModel();
    }

    /**
     * contient tous les fonctions de la page creation de sondage
     *
     * @return void
     */
    public function CreaSond()
    {
      //template page creasondage
      require ROOT."/App/View/CreaSondView.php";

      //permet a l'utilisateur de crée un sondage
      $this->model->CreaSondage();
    }


}