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
       
       
            
            $check =  $this->pdo->prepare('SELECT * FROM t_users WHERE user_mail = ?');
            
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
            
            if($row == 1)
            {
               
                //if(filter_var($email, FILTER_VALIDATE_EMAIL))
               // {
                    
                    
                    
                    if(password_verify($password, $data['user_password'] ) )
                    {   
                        $_SESSION['userId'] = $data['user_id'];
                        $_SESSION['userName'] = $data['user_name'];
                        $_SESSION['connect'] = true;
    
                        header('Location: index.php?page=profil');
                        die();
                    }else 
                    
                    header('Location:index.php?page=Connexion&login_err_password');
                    $_SESSION['connect'] = false;
               // }else header('Location: ConnexionView?login_err=email');
            }else header('Location:index.php?page=Connexion&login_err_already');
        }  
    
        }  
    
    
    }
       // }
        