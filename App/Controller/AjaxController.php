<?php 

namespace App\Controller;
use App\Model\AjaxModel;

class AjaxController {

    /**
      * la fonction __construct éxécute SondageModel lorsque la class est instancié 
      */
       public function __construct()
       {
          $this->model = new AjaxModel();
       }
   
       /**
        * contient tous les fonctions de la page sondage
        *
        * @return void
        */
       public function render()
       {
         if($_GET['function'] == 'refresh'){
            $this->model->refreshTchat();
         }
         else if($_GET['function'] == 'add') {
            $this->model->saveTchat();
         }else if($_GET['function'] == 'score'){
            $this->model->recupReponse();
         }

        require ROOT."/App/View/AjaxView.php";
       }
}