<?php 
namespace App\Model;

use Core\Database;

/**
 * class SondageModel recupere les propriétés et les methods de database grace a extends
 */
class SondageModel extends Database{
    
    /**
     * fonction qui récupère les sondages  stockés dans la bdd et les affiches
     *
     * @return void
     */
    public function recupSondage(){
        
        $recherche =$this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_sondages ON t_users.user_id=t_sondages.user_id  WHERE t_sondages.user_id = :user AND t_sondages.sondage_code=:sondage");
        $recherche->execute([
            ":user" => $_SESSION['userId'],
            ":sondage" => $_GET['c']
        ]);
        $foundUser = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundUser;
    }

    /**
     * fonction qui récupère les reponses stockés dans la bdd et les affiches
     *
     * @return void
     */
    public function recupReponse(){
        
        $recherche =$this->pdo->prepare("SELECT * FROM t_reponses INNER JOIN t_sondages ON t_reponses.sondage_id=t_sondages.sondage_id  WHERE  t_sondages.sondage_code=:sondage");
        $recherche->execute([
            
            ":sondage" => $_GET['c']
        ]);
        $foundUser = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundUser;
    }

    /**
     * fonction qui envoie un mail au amis
     *
     * @return void
     */
    public function emailing(){
        $listFriends = $this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_friends WHERE (friend_id_one = user_id OR friend_id_two = user_id) AND (friend_id_one = :user_one OR friend_id_two = :user_two)");
        $listFriends->execute([
            ":user_one" => $_SESSION['userId'],
            ":user_two" => $_SESSION['userId']
        ]);
        $result = $listFriends->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }
}