<?php 

namespace App\Model;
use Core\Database;

class AmisModel extends Database{

    public function SearchUsers()
    {
        if (isset($_POST["valid-search-user"])){
            if(empty($_POST["search-user"])){
                header("Location:?page=amis");
            } else {   
              $searchQuery = $this->query("SELECT user_name,user_id FROM t_users WHERE user_name LIKE '%".$_POST['search-user']."%' ");  
              return $searchQuery;
            }
        }
    }

    public function ListFriends()
    {
        $listFriends = $this->pdo->prepare("SELECT * FROM t_users INNER JOIN t_friends WHERE (friend_id_one = user_id OR friend_id_two = user_id) AND (friend_id_one = :user_one OR friend_id_two = :user_two)");
        $listFriends->execute([
            ":user_one" => $_SESSION['userId'],
            ":user_two" => $_SESSION['userId']
        ]);
        $result = $listFriends->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function addFriends()
    { 
        if(array_key_exists("ajouter",$_GET)){
            $addFriends = $this->pdo->prepare("INSERT INTO t_friends (friend_id_one,friend_id_two) VALUES (?,?)");
            $addFriends->execute(array(intval($_SESSION['userId']),intval($_GET["ajouter"]))); 
            header("Location:?page=amis");
        }   
    }

    public function deleteFriends()
    { 
        if(array_key_exists("delete",$_GET)){
            $deleteFriends = $this->pdo->prepare("DELETE FROM t_friends WHERE friendship_id = ?");
            $deleteFriends->execute(array(intval($_GET["delete"]))); 
            header("Location:?page=amis");
        }   
    }
}