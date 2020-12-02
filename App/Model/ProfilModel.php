<?php 

namespace App\Model;
use Core\Database;

/**
 * class ProfilModel recupere les propriétés et les methods de database grace a extends
 */
class ProfilModel extends Database{

    /**
     * récupère données utilisateurs
     *
     * @return void
     */
    public function recupProfil()
    {
        return $this->query("SELECT * FROM t_users WHERE user_id =".$_SESSION['userId']);
    }

    /**
     * récupère sondages de l'utilisateur
     *
     * @return void
     */
    public function recupSondUser()
    {
        $recherche =$this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_sondages ON t_users.user_id=t_sondages.user_id WHERE t_sondages.user_id = :user ORDER BY t_sondages.sondage_id DESC");
        $recherche->execute([
            ":user" => $_SESSION['userId']
        ]);
        $foundUser = $recherche->fetchAll(\PDO::FETCH_OBJ);
        return $foundUser;
    }

    /**
     * fonction qui update les données de l'utilisateur
     *
     * @return void
     */
    public function updateUserData()
    {   
        // changement de nom d'utilisateur
        if (isset($_POST["update-user_name"])) 
        {
            if(empty($_POST["new-user_name"])) 
            {
                header("Location:?page=profil");
            } 
            else 
            {
                $alreadyUse = $this->pdo->prepare("SELECT user_name FROM t_users WHERE user_name = ?");
                $alreadyUse->execute(array($_POST["new-user_name"]));
                $row = $alreadyUse->rowCount();
                if ($row > 0){
                    header("Location:?page=profil&alreadyUse");
                } 
                else 
                {
                $updateUserName = $this->pdo->prepare("UPDATE t_users SET user_name= ? WHERE user_id =".$_SESSION["userId"]);
                $updateUserName->execute(array($_POST["new-user_name"]));
                header("Location:?page=profil");
                }
            }

        // changement d'adresse mail
        } 
        else if (isset($_POST["update-user_mail"])) 
        {
                $email = $_POST["new-user_mail"];
            if (empty($_POST["new-user_mail"])) 
            {
                header("Location:?page=profil&erreur");
            } 
            else 
            {
                if (filter_var($email,FILTER_VALIDATE_EMAIL)) 
                {
                    $alreadyUse = $this->pdo->prepare("SELECT user_name FROM t_users WHERE user_mail = ?");
                    $alreadyUse->execute(array($_POST["new-user_mail"]));
                    $row = $alreadyUse->rowCount();
                    if ($row > 0)
                    {
                        echo"pseudo déja pris";
                    } 
                    else 
                    {
                    $updateUserMail = $this->pdo->prepare("UPDATE t_users SET user_mail= ? WHERE user_id =".$_SESSION["userId"]);
                    $updateUserMail->execute(array($_POST["new-user_mail"]));
                    header("Location:?page=profil");
                    }
                }
                
            }

        // changement de mot de passe
        } 
        else if (isset($_POST["update-user_password"])) 
        {
            if (empty($_POST["new-user_password"]) || empty($_POST["confirm_new-user_password"]))
            {
                header("Location:?page=profil&erreur");
            } 
            else 
            {
                if($_POST["new-user_password"] == $_POST["confirm_new-user_password"])
                {
                    $updateUserPassword = $this->pdo->prepare("UPDATE t_users SET user_password= ? WHERE user_id =".$_SESSION["userId"]);
                    $updateUserPassword->execute(array($_POST["new-user_password"]));
                    header("Location:?page=profil");
                } 
                else 
                {
                    header("Location:?page=profil&erreur");
                }
            }
        }
    }
 
}