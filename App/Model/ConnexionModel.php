<?php 

namespace App\Model;
use Core\Database;

class ConnexionModel extends Database{



    public function Searchconnexion()
    { 

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $check =  $this->pdo->prepare('SELECT user_name, user_mail, user_password FROM t_users WHERE user_mail = ?');
        
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
 
        if($row == 1)
        {
            //if(filter_var($email, FILTER_VALIDATE_EMAIL))
           // {
               // $password = hash('sha256', $password);
                if($data['user_password'] === $password)
                {
                    $_SESSION['user'] = $data['user_mail'];
                    $_SESSION['user'] = true;
                    header('Location: index.php?page=profil');
                    die();
                }else header('Location:index.php?page=Connexion_login_err_password');
           // }else header('Location: ConnexionView?login_err=email');
        }else header('Location:index.php?page=Connexion_login_err_already');
    }  

    }  


}