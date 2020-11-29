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
    
    


}