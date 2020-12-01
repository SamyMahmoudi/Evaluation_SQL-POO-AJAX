<?php 
namespace App\Model;

use Core\Database;

class AccueilSondModel extends Database{

    public function recupSondFriends(){
        $recherche =$this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_sondages ON t_users.user_id=t_sondages.user_id INNER JOIN t_friends WHERE (friend_id_one = t_users.user_id OR friend_id_two = t_users.user_id) AND (friend_id_one = :user_one OR friend_id_two = :user_two)");
        $recherche->execute([
            ":user_one" => $_SESSION['userId'],
            ":user_two" => $_SESSION['userId']
        ]);
        $foundFriends = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundFriends;
    }
    
    public function recupSondUser(){
        $recherche =$this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_sondages ON t_users.user_id=t_sondages.user_id WHERE t_sondages.user_id = :user");
        $recherche->execute([
            ":user" => $_SESSION['userId']
        ]);
        $foundUser = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundUser;
    }

}