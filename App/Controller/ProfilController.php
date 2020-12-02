<?php 

namespace App\Controller;
use App\Model\ProfilModel;

/**
 *  class ProfilController utilise la function  public function __construct() 
 *        et la function public function render()
 */
class ProfilController {
 

     /**
   * la fonction __construct éxécute profilModel lorsque la class est instancié 
   */
    public function __construct()
    {
       $this->model = new ProfilModel();
    }

    /**
     * contient tous les fonctions de la page profil
     *
     * @return void
     */
    public function render()
    {
      // verifie que l'utilisateur s'est bien connecté
      if ($_SESSION['connect'] == false) 
      {
        header("Location:index.php?page=Connexion");
      }

      // recup sondages from user
      $sondages = $this->model->recupSondUser();

      // recup data from user  
      $profil = $this->model->recupProfil();

      // modification données
      $this->model->updateUserData();
      
      // template page profil
      require ROOT."/App/View/ProfilView.php";
      

    }
}