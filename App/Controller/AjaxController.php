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

        //gere les fonctions ajax
       public function render()
       {
          //rafraichir le chat
         if($_GET['function'] == 'refresh')
         {
            $this->model->refreshTchat();
         }
         
         // ajouter les commentaires
         else if($_GET['function'] == 'add') 
         {
            $this->model->saveTchat();
         }

         //rafraichir le score
         else if($_GET['function'] == 'score')
         {
            $this->model->recupReponse();
         }

        require ROOT."/App/View/AjaxView.php";
       }
}