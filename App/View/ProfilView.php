<?php 

    $pdo = new PDO("mysql:host=localhost;dbname=SondaPote","root","");
    $query= $pdo->query("SELECT user_name,user_mail,user_password FROM t_users WHERE user_id = 1");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // Changement de nom
    if (isset($_POST["update-user_name"])) {
        if(empty($_POST["new-user_name"])) {
            header("Location:ProfilView.php?champ-vide");
        } else {
        $updateUserName = $pdo->prepare("UPDATE t_users SET user_name= ? WHERE user_id = 1");
        $updateUserName->execute(array($_POST["new-user_name"]));
        header("Location:ProfilView.php");
        }
    }
        
    // Changement d'adresse mail
    if (isset($_POST["update-user_mail"])) {
        if (empty($_POST["new-user_mail"])) {
            header("Location:ProfilView.php?champ-vide");
        } else {
        $updateUserMail = $pdo->prepare("UPDATE t_users SET user_mail= ? WHERE user_id = 1");
        $updateUserMail->execute(array($_POST["new-user_mail"]));
        header("Location:ProfilView.php");
        }
    }

    // Changement de mot de passe
    if (isset($_POST["update-user_password"])) {
        if (empty($_POST["new-user_password"])){
            header("Location:ProfilView.php?champ-vide");
        } else {
        $updateUserPassword = $pdo->prepare("UPDATE t_users SET user_password= ? WHERE user_id = 1");
        $updateUserPassword->execute(array($_POST["new-user_password"]));
        header("Location:ProfilView.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/profil.css">
</head>

<body>

    <header>
        <nav class="nav-user">
            <ul>
                <li>
                    <a href="ProfilView.php">Profil</a>
                </li>
                <li>
                    <a href="">Sondage</a>
                </li>
                <li>
                    <a href="">Amis</a>
                </li>
                <li>
                    <a href="">Déconnexion</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="profil-section">

            <div class="container-profil">
                <h1>Profil</h1>

                <!-- Données actuelles de l'utilisateur -->

                <?php foreach($result as $dataUser):?>
                <div class="profil-data">
                    <h2><?= $dataUser["user_name"] ?></h2>
                </div>
                <div class="profil-data">
                    <h2><?= $dataUser["user_mail"] ?></h2>
                </div>
                <div class="profil-data">
                    <h2><?= $dataUser["user_password"] ?></h2>
                </div>
                <?php endforeach ?>
            </div>

            <!-- Form pour modifier les données actuelles de l'utilisateur -->

            <form class="modif-profil" method="POST">
                <h1>Modifier le profil</h1>
                <div class="modif-tool">
                    <label for="">Nouveau nom d'utilisateur</label>
                    <input type="text" name="new-user_name" id=""  maxlength="20" placeholder="Nouveau nom d'utilisateur">
                    <input type="submit" value="Valider" name="update-user_name">
                </div>
                <div class="modif-tool">
                    <label for="">Nouvelle addresse mail</label>
                    <input type="email" name="new-user_mail" maxlength="20" id="" placeholder="Nouvelle addresse mail">
                    <input type="submit" value="Valider" name="update-user_mail">
                </div>
                <div class="modif-tool">
                    <label for="">Nouveau mot de passe</label>
                    <input type="password" name="new-user_password" maxlength="20" id="" placeholder="Nouveau mot de passe">
                    <input type="submit" value="Valider" name="update-user_password">
                </div>
            </form>

        </section>
    </main>

</body>

</html>