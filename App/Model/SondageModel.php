<?php 
namespace App\Model;

use Core\Database;

class SondageModel extends Database{
    
    public function recupSondage(){
        
        $recherche =$this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_sondages ON t_users.user_id=t_sondages.user_id  WHERE t_sondages.user_id = :user AND t_sondages.sondage_code=:sondage");
        $recherche->execute([
            ":user" => $_SESSION['userId'],
            ":sondage" => $_GET['c']
        ]);
        $foundUser = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundUser;
    }

    public function recupReponse(){
        
        $recherche =$this->pdo->prepare("SELECT * FROM t_reponses INNER JOIN t_sondages ON t_reponses.sondage_id=t_sondages.sondage_id  WHERE  t_sondages.sondage_code=:sondage");
        $recherche->execute([
            
            ":sondage" => $_GET['c']
        ]);
        $foundUser = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundUser;
    }

    public function emailing(){
        $listFriends = $this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_friends WHERE (friend_id_one = user_id OR friend_id_two = user_id) AND (friend_id_one = :user_one OR friend_id_two = :user_two)");
        $listFriends->execute([
            ":user_one" => $_SESSION['userId'],
            ":user_two" => $_SESSION['userId']
        ]);
        $result = $listFriends->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function repUsers(){
        if(isset($_POST['envoiRep']) AND !empty($_POST['reponse']))
        {
            $stockRep = $this->pdo->prepare("INSERT INTO t_usersReponses(user_id,sondage_code,reponse_titre) VALUES (?,?,?)");
            $stockRep->execute(array(
                $_SESSION['userId'],
                $_GET['c'],
                $_POST['reponse'])
            );
            $sdg = $this->pdo->prepare("SELECT sondage_id FROM t_sondages WHERE sondage_code = ?");
            $sdg->execute(array($_GET['c']));
            $sondage_id = $sdg->fetch(\PDO::FETCH_ASSOC);
            $choix = $this->pdo->prepare("UPDATE t_reponses SET reponse_score = reponse_score+1 WHERE sondage_id = ? AND reponse_titre = ?");
            $choix->execute(array($sondage_id['sondage_id'],$_POST['reponse']));
        }
    }
}