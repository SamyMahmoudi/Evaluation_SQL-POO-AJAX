<?php 
namespace App\Model;

use Core\Database;

/**
 * class SondageModel recupere les propriétés et les methods de database grace a extends
 */
class AjaxModel extends Database{

    public function refreshTchat()
    {
 
        $requete = $this->pdo->prepare('SELECT * FROM t_tchat INNER JOIN t_users ON t_users.user_id = t_tchat.user_id WHERE t_tchat.sondage_code = ?');
        $requete->execute(array($_GET['c']));
        $messages = $requete->fetchAll();
        echo json_encode($messages);
        
    }

    public function saveTchat()
    {
            
        $insertion = $this->pdo->prepare('INSERT INTO t_tchat (user_id, tchat_message, sondage_code) VALUES(?, ?, ?)');
        $insertion->execute(array($_GET['id'],$_GET['msg'], $_GET['c']));
            
    }
    
    public function recupReponse()
    {

        $recherche =$this->pdo->prepare("SELECT * FROM t_reponses INNER JOIN t_sondages ON t_reponses.sondage_id=t_sondages.sondage_id  WHERE  t_sondages.sondage_code=:sondage");
        $recherche->execute([
                
        ":sondage" => $_GET['c']
        ]);
        $score = $recherche->fetchAll(\PDO::FETCH_OBJ);
        echo json_encode($score);

    }
}