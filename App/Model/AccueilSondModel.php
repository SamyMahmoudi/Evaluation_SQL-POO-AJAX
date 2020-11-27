<?php 
namespace App\Model;

use Core\Database;

class AccueilSondModel extends Database{

    public function recupSond(){
        $recherche =$this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_sondages ON t_users.user_id=t_sondages.user_id INNER JOIN t_friends WHERE (friend_id_one = t_users.user_id OR friend_id_two = t_users.user_id) AND (friend_id_one = :user_one OR friend_id_two = :user_two)");
        $recherche->execute([
            ":user_one" => $_SESSION['userId'],
            ":user_two" => $_SESSION['userId']
        ]);
        $found = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $found;
    }
    // public function recupUsername(){
    //     $username = $this->query("SELECT user_name FROM t_users WHERE user_id ="$sondages->user_id);  
    //     return $username;
    // }

}