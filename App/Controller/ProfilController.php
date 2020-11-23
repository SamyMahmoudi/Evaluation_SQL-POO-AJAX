<?php 

namespace App\Controller;
use App\Model\ProfilModel;

class ProfilController {

    public $model;

    public function __construct()
    {
       $this->model = new ProfilModel();
    }

    public function render()
    {
      // verifie que l'utilisateur s'est bien connecté
      if ($_SESSION['connect'] == false) {
        header("Location:index.php?page=Connexion");
        }

      // recup data from user  
      $profil = $this->model->recupProfil();

      // modification données
      $this->model->updateUserData();
      
      // template page profil
      require ROOT."/App/View/ProfilView.php";
      

    }
}