<?php 

namespace App\Model;
use Core\Database;
/**
 * class ConnexionModel récupère les propriétés et les methods de database grace a extends
 */
class ConnexionModel extends Database{

    /**
     *  fonction qui verifie si l'utilisateur est inscrit dans la bdd et si il peut se connecter.
     *
     * @return void
     */
    public function Searchconnexion()
    { 
        
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            
            
            $check =  $this->pdo->prepare('SELECT * FROM t_users WHERE user_mail = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();

            // verif if user already exist
            if($row == 1 AND filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                
                if(password_verify($password, $data['user_password']))
                {   
                    $_SESSION['userId'] = $data['user_id'];
                    $_SESSION['userName'] = $data['user_name'];
                    $_SESSION['connect'] = true;
                    // permet d'indiqué si l'utilisateur est connecté
                    $shareConnect = $this->query("UPDATE t_users SET user_isConnected = 1 WHERE user_id =".$_SESSION['userId']);
                    header('Location: index.php?page=profil');
                    die();
                } 
                else 
                    header('Location:index.php?page=connexion&login_err_password');
                    $_SESSION['connect'] = false;
            } 
            else header('Location:index.php?page=connexion&login_err_already');
        }  
    }  
}
        