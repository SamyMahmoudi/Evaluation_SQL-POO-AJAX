<?php 

namespace App\Controller;
use App\Model\AccueilSondModel;

/**
 *  class AccueilSondController utilise la function  public function __construct() 
 *        et la function public function render()
 */
class AccueilSondController {


   /**
   * la fonction __construct éxécute AccueilSondModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new AccueilSondModel();
    }
    /**
     * function qui effectue recupSondFriend et recupSondUser 
     *
     * @return void
     */
    public function render()
    {
      //recupere les sondages des amis
      $sondagesFriends = $this->model->recupSondFriends();

      //recupere le sondage de l'utilisateur
      $sondagesUser = $this->model->recupSondUser();

      // template page AccueilSond
      require ROOT."/App/View/AccueilSondView.php";
    }
}