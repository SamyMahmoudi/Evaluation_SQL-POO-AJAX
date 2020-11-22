<?php 

namespace App\Model;
use Core\Database;

class ProfilModel extends Database{

    // récupère données utilisateurs
    public function recupProfil(){
        return $this->query("SELECT * FROM t_users WHERE user_id =".$_SESSION['userId']);
    }

    public function updateUserData()
    {   
        // changement de nom d'utilisateur
        if (isset($_POST["update-user_name"])) {
            if(empty($_POST["new-user_name"])) {
                header("Location:?page=profil");
            } else {
                $alreadyUse = $this->pdo->prepare("SELECT user_name FROM t_users WHERE user_name = ?");
                $alreadyUse->execute(array($_POST["new-user_name"]));
                $row = $alreadyUse->rowCount();
                if ($row > 0){
                    header("Location:?page=profil&alreadyUse");
                } else {
                $updateUserName = $this->pdo->prepare("UPDATE t_users SET user_name= ? WHERE user_id =".$_SESSION["userId"]);
                $updateUserName->execute(array($_POST["new-user_name"]));
                header("Location:?page=profil");
                }
            }

        // changement d'adresse mail
        } else if (isset($_POST["update-user_mail"])) {
            if (empty($_POST["new-user_mail"])) {
                header("Location:?page=profil&erreur");
            } else {
                $alreadyUse = $this->pdo->prepare("SELECT user_name FROM t_users WHERE user_mail = ?");
                $alreadyUse->execute(array($_POST["new-user_mail"]));
                $row = $alreadyUse->rowCount();
                if ($row > 0){
                    echo"pseudo déja pris";
                } else {
                $updateUserMail = $this->pdo->prepare("UPDATE t_users SET user_mail= ? WHERE user_id =".$_SESSION["userId"]);
                $updateUserMail->execute(array($_POST["new-user_mail"]));
                header("Location:?page=profil");
                }
            }

        // changement de mot de passe
        } else if (isset($_POST["update-user_password"])) {
            if (empty($_POST["new-user_password"]) || empty($_POST["confirm_new-user_password"])){
                header("Location:?page=profil&erreur");
            } else {
                if($_POST["new-user_password"] == $_POST["confirm_new-user_password"]){
                    $updateUserPassword = $this->pdo->prepare("UPDATE t_users SET user_password= ? WHERE user_id =".$_SESSION["userId"]);
                    $updateUserPassword->execute(array($_POST["new-user_password"]));
                    header("Location:?page=profil");
                } else {
                    header("Location:?page=profil&erreur");
                }
            }
        }
    }
 
}