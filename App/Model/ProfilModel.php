<?php 

namespace App\Model;
use Core\Database;

class ProfilModel extends Database{


    // changement de nom d'utilisateur
    public function updateName()
    {
        if (isset($_POST["update-user_name"])) {
            if(empty($_POST["new-user_name"])) {
                header("Location:?page=profil_erreur");
            } else {
            $updateUserName = $this->pdo->prepare("UPDATE t_users SET user_name= ? WHERE user_id = 1");
            $updateUserName->execute(array($_POST["new-user_name"]));
            header("Location:?page=profil");
            }
        }
    }

    // changement d'adresse mail
    public function updateMail()
    {
        if (isset($_POST["update-user_mail"])) {
            if (empty($_POST["new-user_mail"])) {
                header("Location:?page=profil_erreur");
            } else {
            $updateUserMail = $this->pdo->prepare("UPDATE t_users SET user_mail= ? WHERE user_id = 1");
            $updateUserMail->execute(array($_POST["new-user_mail"]));
            header("Location:?page=profil");
            }
        }
    }

    // changement de mot de passe
    public function updatePassword()
    {
        if (isset($_POST["update-user_password"])) {
            if (empty($_POST["new-user_password"])){
                header("Location:?page=profil_erreur");
            } else {
            $updateUserPassword = $this->pdo->prepare("UPDATE t_users SET user_password= ? WHERE user_id = 1");
            $updateUserPassword->execute(array($_POST["new-user_password"]));
            header("Location:?page=profil");
            }
        }
    }


}
