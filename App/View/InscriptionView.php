<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/inscription.css">
</head>

<body class="body-inscription">

    <nav class="nav-form">
        <ul>
            <li>
                <a href="AccueilView.php">Accueil</a>
            </li>
            <li>
                <a href="InscriptionView.php">Inscription</a>
            </li>
            <li>
                <a href="ConnexionView.php">Connexion</a>
            </li>
        </ul>
    </nav>

    <?php 

        $bdd = new PDO ('mysql:host=localhost;dbname=sondapote', 'root', '');

        if(isset($_POST['valid'])) {
            
            $username = $_POST['username'];
            $email = $_POST['email'];
            
            $verif = $bdd -> prepare("SELECT COUNT(*) FROM t_user WHERE user_name = ".$_POST['username'].", user_mail = ".$_POST['email']."");
            $verif->execute(array ());
            $donnees = $verif->fetchColumn();
            if ($donnees == 0){
                if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['mdpasse'])){
                    if($_POST['mdpasse'] == $_POST['confirm']){
                        $requete = $bdd->prepare("INSERT INTO t_user(user_name, user_mail, user_password) VALUES(?,?,?)");
                        $requete->execute(array($_POST["username"], $_POST["email"], $_POST["mdpasse"]));
                    }
                    else{
                        echo 'mot de passe mal écrit';
                    }
                }else{
                    echo 'champs non remplis';
                }
            }else{
                echo 'Mail ou pseudo déjà existant';
            }
            var_dump($donnees);
        }
    ?>

    <div class="main-inscription">
        <form method="POST" id="form-inscription" >

            <h1>Formulaire d'inscription</h1>

            <input type="text" name="username" placeholder="entrez votre nom d'utilisateur" >
            <input type="email" name="email" placeholder="entrez votre adresse mail" >
            <input type="password" name="mdpasse" placeholder="entrez un mot de passe" >
            <input type="password" name="confirm" placeholder="validez le mot de passe">
            <input type="submit" name="valid" value="S'inscrire">

        </form>
        
    </div>


</body>

</html>