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
        // recupere donnees utilisateur
        $amis = $this->model->query("SELECT user_name FROM t_users");
        //recherche de joueurs
        //$this->model->SearchFriends();
        //template page amis
        require ROOT."/App/View/AmisView.php";
    }
    // public function SearchFriends()
    // {
        // if (isset($_POST["valid-search-user"])){
        //     if(empty($_POST["search-user"])){
        //         header("Location:?page=amis");
        //     } else {   
        //         $searchQuery = $this->model->query("SELECT user_name,user_id FROM t_users WHERE user_name LIKE ".'%'.$_POST['search-user'].'%'."");
        //         //$searchQuery->execute(array($_POST["search-user"]));
        //         header("Location:?page=amis");
        //     }
        // }
    //     if (isset($_POST["valid-search-user"]))
    //     {    if(empty($_POST["search-user"])){
    //         header("Location:amisView.php");
    //     } else {
    //         $searchQuery = $this->model->prepare("SELECT user_name,user_id FROM t_users WHERE user_name LIKE '%?%'");
    //         $searchQuery->execute(array($_POST["search-user"]));
    //         foreach($searchQuery as $sch): 
    //             echo "<tr><td>".$sch["user_name"]."</td><td><button>Ajouter</button></td></tr>";
    //         endforeach;
    //         }
    //     }
    // }


}