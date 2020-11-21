<?php 

namespace App\Model;
use Core\Database;

class InscriptionModel extends Database{

    public function inscription()
    {   
        //Quand le bouton est validé
        if(isset($_POST['valid'])) {
            
            //Prend les données des input
            $username = $_POST['username'];
            $email = $_POST['email'];
            
            //Fait la verif si pseudo existe dans la BDD
            $verif = $this->pdo->prepare("SELECT user_name FROM t_users WHERE user_name = ?");
            $verif->execute(array($username));
            $donnees = $verif->rowCount();
            if ($donnees == 0){
                //Fait la verif si pseudo existe dans la BDD
                $verif2 = $this->pdo->prepare("SELECT user_mail FROM t_users WHERE user_mail = ?");
                $verif2->execute(array($email));
                $donnees2 = $verif2->rowCount();
                if($donnees2 == 0){
                //Verifie si les champs sont remplis
                    if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['mdpasse'])){
                        //Verifie si les mots de passes sont identiques
                        if($_POST['mdpasse'] == $_POST['confirm']){
                            $requete = $this->pdo->prepare("INSERT INTO t_users(user_name, user_mail, user_password) VALUES(?,?,?)");
                            $requete->execute(array($_POST["username"], $_POST["email"], $_POST["mdpasse"]));
                        }
                        else{
                            echo 'mot de passe mal écrit';
                        }
                    }else{
                        echo 'champs non remplis';
                    }
                }else{
                    echo 'Mail déjà existant';
                }
            }else{
                echo 'Pseudo déjà existant';
            }
        }
    }
}