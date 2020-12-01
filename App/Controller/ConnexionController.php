<?php 

namespace App\Controller;
use App\Model\ConnexionModel;

/**
 *  class ConnexionController utilise la function  public function __construct() 
 *        et la function public function Connexion()
 */
class ConnexionController {

   /**
   * la fonction __construct éxécute ConnexionModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new ConnexionModel();
    }
    
    /**
     * contient tous les fonctions de la page connexion
     *
     * @return void
     */

    public function Connexion()
    {
      //connecte l'utilisateur
      $this->model->Searchconnexion(); 

      //template page Connexion
      require ROOT."/App/View/ConnexionView.php";
    }
}