<?php 

namespace App\Controller;
use App\Model\AccueilModel;



/**
 *  class AccueilController utilise la function  public function __construct() 
 *        et la function public function render()
 */
class AccueilController {

  /**
   * la fonction __construct éxécute AccueilModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new AccueilModel();
    }

    /**
     *function render qui redirige vers la view
     *
     * @return void
     */
    public function render()
    {
      // template page Accueil
      require ROOT."/App/View/AccueilView.php";
    }
}