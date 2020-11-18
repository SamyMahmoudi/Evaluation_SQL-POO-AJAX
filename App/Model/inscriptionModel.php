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
            
            //Fait la verif si existe dans la BDD
            $verif = $this-> pdo -> prepare("SELECT COUNT(*) FROM t_user WHERE user_name = ".$_POST['username'].", user_mail = ".$_POST['email']."");
            $verif->execute(array ());
            $donnees = $verif->fetchColumn();
            if ($donnees == 0){
                //Verifie si les champs sont remplis
                if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['mdpasse'])){
                    //Verifie si les mots de passes sont identiques
                    if($_POST['mdpasse'] == $_POST['confirm']){
                        $requete = $this->pdo->prepare("INSERT INTO t_user(user_name, user_mail, user_password) VALUES(?,?,?)");
                        $requete->execute(array($_POST["username"], $_POST["email"], $_POST["mdpasse"]));
                    }
                    else{
                        echo 'mot de passe mal écrit';
                    }
                }else{
                    echo 'champs non remplis';
                }
            }else{
                echo 'Mail ou pseudo déjà existant';
            }
            var_dump($donnees);
        }
    }
}