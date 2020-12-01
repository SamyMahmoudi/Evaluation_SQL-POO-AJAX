<?php 
    namespace App\Model;
    use Core\Database;

    class DisconnectModel extends Database {

        public function disconnect() {

            // disconnect user
            if ($_GET['page'] == 'disconnect') {
                $requete = $this->query("UPDATE t_users SET user_isConnected = 0 WHERE user_id =".$_SESSION['userId']);
                $_SESSION['connect'] = false;
                session_destroy();
            }
        }
    }