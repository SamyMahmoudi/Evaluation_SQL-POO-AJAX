<?php 

namespace App\Model;
use Core\Database;

class AmisModel extends Database{

    public function SearchFriends()
    {
        if (isset($_POST["valid-search-user"])){
            if(empty($_POST["search-user"])){
                header("Location:amisView.php");
            } else {   
                $searchQuery = $this->pdo->prepare("SELECT user_name,user_id FROM t_users WHERE user_name LIKE '%?%'");
                $searchQuery->execute(array($_POST["search-user"]));
            }
        }
    }
   
}