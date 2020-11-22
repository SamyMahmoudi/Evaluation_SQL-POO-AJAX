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
                    <a href="">Actu</a>
                </li>
                <li>
                    <a href="index.php?page=profil">Profil</a>
                </li>
                <li>
                    <a href="">Sondage</a>
                </li>
                <li>
                    <a href="index.php?page=amis">Amis</a>
                </li>
                
            </ul>
        </nav>
    </header>

    <main class="main-profil">
        <section id="profil-section">

            <div class="container-profil">
                <h1>Profil</h1>

                <!-- Données actuelles de l'utilisateur à récuperer dans la $_SESSION -->

                <?php foreach($profil as $dataUser):?>
                <div class="profil-data">
                    <h2><span>Nom :</span>  <?= htmlspecialchars($dataUser->user_name) ?></h2>
                </div>
                <div class="profil-data">
                    <h2><span>Mail : </span> <?= htmlspecialchars($dataUser->user_mail) ?></h2>
                </div>
                <div class="profil-data">
                    <h2><span> Password : </span><?= htmlspecialchars($dataUser->user_password)?></h2>
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
                    <label for="">Nouvelle adresse mail</label>
                    <input type="email" name="new-user_mail" maxlength="20" id="" placeholder="Nouvelle adresse mail">
                    <input type="submit" value="Valider" name="update-user_mail">
                </div>
                <div class="modif-tool pass-modif">
                    <input type="password" name="new-user_password" maxlength="20" id="new-user_password" placeholder="Nouveau mot de passe">
                    <input type="password" name="confirm_new-user_password" maxlength="20" id="confirm_new-user_password" placeholder="confirmer nouveau mdp">
                    <input type="submit" value="Valider" name="update-user_password">
                </div>
            </form>

        </section>
    </main>

</body>

</html>