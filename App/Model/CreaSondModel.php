<?php 
namespace App\Model;

use Core\Database;

/**
 * class CreaSondModel recupere les propriétés et les methods de database grace a extends
 */
class CreaSondModel extends Database{

    /**
     *  fonction qui sert à créer un sondage 
     *
     * @return void
     */
    public function CreaSondage(){

        if(isset($_POST["valid"])){
            $i = 1;
            $temps = $_POST["temps"];
            $titre = $_POST["titre"];
            $titrehash = password_hash($titre, PASSWORD_DEFAULT);
            $reponse = $_POST["reponse".$i];
            if(!empty($titre) AND !empty($reponse)){
                $requete = $this->pdo->prepare("INSERT INTO t_sondages(sondage_titre, sondage_temps, user_id, sondage_code) VALUES(?, ?, ?, ?)");
                $requete->execute(array($titre, $temps, $_SESSION['userId'], $titrehash));
                if($requete){
                $id = $this->pdo->prepare("SELECT sondage_id FROM t_sondages WHERE sondage_titre = ?");
                $id->execute(array($titre));
                $result = $id->fetchAll();
                foreach ($result as $test){
                    $luck = $test['sondage_id'];
                }
               
             while(isset($_POST["reponse".$i])){
                $requete2 = $this->pdo->prepare("INSERT INTO t_reponses(sondage_id, reponse_titre) VALUES (?, ?)");
                $requete2->execute(array($luck, $_POST["reponse".$i]));
                $i++;
            }
            }
            
            }else{
                echo "Vous n'avez pas rentré de questions";
            }
            

        
        
        }
    }

}