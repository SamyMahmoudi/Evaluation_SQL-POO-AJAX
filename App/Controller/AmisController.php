<?php 

namespace App\Controller;
use App\Model\AmisModel;


/**
 *  class AmisController utilise la function  public function __construct() 
 *        et la function public function render()
 */
class AmisController {

     /**
   * la fonction __construct éxécute AmislModel lorsque la class est instancié 
   */
    public function __construct()
    {
        $this->model = new AmisModel();
    }

    /**
     * contient tous les fonctions de la page amis
     *
     * @return void
     */
    public function render()
    {
        //verifie si un utilisateur est connecté sinon le redirige sur la page connexion
        if ($_SESSION['connect'] == false)
        {
        header("Location:index.php?page=Connexion");
        }

        //stock la $_SESSION dans une variable
        $userCheck[] = $_SESSION['userId'];

        // recupere liste des amis
        $amis = $this->model->ListFriends();

        //recherche de joueurs
        $resultSearch = $this->model->SearchUsers();

        // ajouter un ami
        $this->model->addFriends();

        // supprimer un ami
        $this->model->deleteFriends();
        
        //template page amis
        require ROOT."/App/View/AmisView.php";
    }
    

}