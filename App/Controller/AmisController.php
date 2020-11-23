<?php 

namespace App\Controller;
use App\Model\AmisModel;

class AmisController {


    public function __construct()
    {
        $this->model = new AmisModel();
    }

    public function render()
    {
        if ($_SESSION['connect'] == false) {
        header("Location:index.php?page=Connexion");
        }
        
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