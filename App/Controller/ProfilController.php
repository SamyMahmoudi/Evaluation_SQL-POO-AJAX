<?php 

namespace App\Controller;
use App\Model\ProfilModel;

class ProfilController {


    public function __construct()
    {
       $this->model = new ProfilModel();
    }

    public function render()
    {

      $result = $this->model->query("SELECT user_name,user_mail,user_password FROM t_users WHERE user_id = 1");

      $this->model->updateName();
      $this->model->updateMail();
      $this->model->updatePassword();

      require ROOT."/App/View/ProfilView.php";

    }


}