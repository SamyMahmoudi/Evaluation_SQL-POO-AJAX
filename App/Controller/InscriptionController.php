<?php 

namespace App\Controller;
use App\Model\InscriptionModel;

/**
 *  class InscriptionController utilise la function  public function __construct() 
 *        et la function public function inscrire()
 */
class InscriptionController{

    /**
   * la fonction __construct éxécute InsciptionModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new InscriptionModel();
    }

    
/**
     * contient tous les fonctions de la page d'inscription
     *
     * @return void
     */
    public function inscrire()
    {

      //template page Inscription
      require ROOT."/App/View/InscriptionView.php";

      // inscrit l'utilisateur
      $this->model->inscription();

    }


}