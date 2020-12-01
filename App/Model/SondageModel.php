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

    public function recupSondage()
    {
        $recherche =$this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_sondages ON t_users.user_id=t_sondages.user_id  WHERE t_sondages.sondage_code=:sondage");
        $recherche->execute([
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
    public function recupReponse()
    {
        $recherche =$this->pdo->prepare("SELECT * FROM t_reponses INNER JOIN t_sondages ON t_reponses.sondage_id=t_sondages.sondage_id  WHERE  t_sondages.sondage_code=:sondage");
        $recherche->execute([
            
            ":sondage" => $_GET['c']
        ]);
        $foundUser = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundUser;
    }

    /**
     * fonction qui list les amis
     *
     * @return void
     */
    public function emailing()
    {
        $listFriends = $this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_friends WHERE (friend_id_one = user_id OR friend_id_two = user_id) AND (friend_id_one = :user_one OR friend_id_two = :user_two)");
        $listFriends->execute([
            ":user_one" => $_SESSION['userId'],
            ":user_two" => $_SESSION['userId']
        ]);
        $result = $listFriends->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * gere les reponses des utilisateurs
     *
     * @return void
     */
    public function repUsers()
    {
        if(isset($_POST['envoiRep']) AND !empty($_POST['reponse']))
        {
            $userId = $_SESSION['userId'];
            $alreadyRep = $this->pdo->prepare("SELECT * FROM t_usersReponses WHERE user_id = ? AND sondage_code = ? ");
            $alreadyRep->execute(array($userId,$_GET['c']));
            $row = $alreadyRep->rowCount();
            if($row == 0)
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
            else 
            {
                header("location:index.php?page=sondage&answer=yes&c=".$_GET['c']);
            }

        }
    }
    /**
     * gere le temps du sondage
     *
     * @return void
     */
    public function sdgFinish()
    {    
        $endate = $this->pdo->query("UPDATE t_sondages SET sondage_statut = 'Finish' WHERE sondage_temps <= NOW()");
    }
}