<?php 

$bdd = new \PDO ("mysql:host=localhost;dbname=sondapote",'root','');

$query = $bdd->query("SELECT * FROM t_users INNER JOIN t_friends WHERE (friend_id_one = user_id OR friend_id_two = user_id) AND (friend_id_one = 1 OR friend_id_two = 1) ");
$result = $query->fetchAll(PDO::FETCH_OBJ);
$_SESSION['userName'] = 'Samy';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Amis</title>
    <link rel="stylesheet" href="css/inscription.css">

<body>

    <ul>
        <h2>Amis Connectés</h2>
        <?php foreach ($result as $ami )
            {
                
                if($ami->user_id != 1 AND $ami->user_isConnected == 1)
                {
                    echo "<li>". $ami->user_name." </li>";
                }
            } 
            echo "<a href ='listeAmis.php?emailing'> Cliquez ici pour envoyer un mail à tous vos amis !</a>";
            if (array_key_exists("emailing",$_GET))
            {
                
                foreach ($result as $ami )
                {
                    if($ami->user_id != 1)
                    {
                        $destinataire = $ami->user_mail;
                        $username = $_SESSION['userName'];
                        $objet = "Nouveau Sondage de ".$username."";
                        $contenu = "<html><meta charset='UTF-8'><body><p>". $username ." t'invite à participer à son sondage. <br>  <a href='http://localhost/'>Clique sur ce lien</a> pour te connecter et répondre à ".$username." <br> (le lien renvoi actuellement sur la page d'accueil localhost)</p></body><html>";
                        $headers[] = 'MIME-Version: 1.0';
                        $headers[] = 'Content-type: text/html; charset=utf-8';
                        mail($destinataire,$objet,$contenu,implode("\r\n", $headers));
                    }
                }
            }
            ?>
    </ul>

</body>

</head>