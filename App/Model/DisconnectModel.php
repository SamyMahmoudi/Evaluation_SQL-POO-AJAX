<?php 
    namespace App\Model;
    use Core\Database;

    /**
 * class DisconnectModel recupere les propriétés et les methods de database grace a extends
 */
    class DisconnectModel extends Database {

        /**
         * fonction qui deconnecte l'utilisateur en updatant la bdd
         *
         * @return void
         */
        public function disconnect() {

            // disconnect user
            if ($_GET['page'] == 'disconnect') {
                $requete = $this->query("UPDATE t_users SET user_isConnected = 0 WHERE user_id =".$_SESSION['userId']);
                $_SESSION['connect'] = false;
                session_destroy();
            }
        }
    }