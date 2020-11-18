<?php 

namespace App\Controller;
use App\Model\ProfilModel;

class ProfilController {

    public function __construct()
    {
       $this->model = new ProfilModel();
    }

    public function profil()
    {
      // recupere donnees utilisateur
      $profil = $this->model->query("SELECT user_name,user_mail,user_password FROM t_users WHERE user_id = 1");
      // modification données
      $this->model->updateUserData();
      // template page profil
      require ROOT."/App/View/ProfilView.php";

    }
}