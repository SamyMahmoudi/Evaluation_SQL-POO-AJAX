<?php 

namespace App\Model;
use Core\Database;

class InscriptionModel extends Database{

    public function inscription()
    {   
        //Quand le bouton est validé
        if(isset($_POST['valid'])) {
            
            //Prend les données des input
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $mdp = password_hash($_POST['mdpasse'], PASSWORD_DEFAULT);
            
            //Fait la verif si pseudo existe dans la BDD
            
            $verif = $this->pdo->prepare("SELECT user_name FROM t_users WHERE user_name = ?");
            $verif->execute(array($username));
            $donnees = $verif->rowCount();
            if ($donnees == 0){
                //Fait la verif si pseudo existe dans la BDD
                $verif2 = $this->pdo->prepare("SELECT user_mail FROM t_users WHERE user_mail = ?");
                $verif2->execute(array($email));
                $donnees2 = $verif2->rowCount();
                if($donnees2 == 0 AND filter_var($email, FILTER_VALIDATE_EMAIL)){
                //Verifie si les champs sont remplis
                    if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['mdpasse'])){
                        //Verifie si les mots de passes sont identiques
                        if($_POST['mdpasse'] == $_POST['confirm']){
                            $requete = $this->pdo->prepare("INSERT INTO t_users(user_name, user_mail, user_password) VALUES(?,?,?)");
                            $requete->execute(array($username, $email, $mdp));
                            header("location:index.php?page=connexion");
                        }
                        else{
                            echo '<div id="fond"><div id="erreur"><span>mot de passe mal écrit</span><button id="erreurBouton">OK</button></div>';
                        }
                    }else{
                        echo '<div id="fond"><div id="erreur"><span>champs non remplis</span><button id="erreurBouton">OK</button></div></div>';
                    }
                }else{
                    echo '<div id="fond"><div id="erreur"><span>Mail déjà existant ou non valide</span><button id="erreurBouton">OK</button></div></div';
                }
            }else{
                echo '<div id="fond"><div id="erreur"><span>Pseudo déjà existant</span><button id="erreurBouton">OK</button></div></div>';
            }
        }
    }
}