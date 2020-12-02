<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/profil.css">
</head>

<body>

    <header class="header-user header-user-profil">
        <?php include('inc/headerUser.php'); ?>
    </header>
    <main class="main-profil">
        <section id="profil-section">
            <div class="container-profil">
                <h1>Profil</h1>
                <?php foreach($profil as $dataUser):?>
                <div class="profil-data">
                    <h2><span>Nom :</span>  <?= htmlspecialchars($dataUser->user_name) ?></h2>
                </div>
                <div class="profil-data">
                    <h2><span>Mail : </span> <?= htmlspecialchars($dataUser->user_mail) ?></h2>
                </div>
                <!-- <div class="profil-data">
                    <h2><span> Password : </span>***</h2>
                </div> -->
                <?php endforeach ?>
            </div>
            <div class="modif-profil" >
                <h1>Modifier le profil</h1>
                <form class="modif-tool" method="POST">
                    <label for="">Nouveau nom d'utilisateur</label>
                    <input type="text" name="new-user_name" id=""  maxlength="20" placeholder="Nouveau nom d'utilisateur">
                    <input type="submit" value="Valider" name="update-user_name">
                </form>
                <form class="modif-tool" method="POST">
                    <label for="">Nouvelle adresse mail</label>
                    <input type="email" name="new-user_mail" maxlength="20" id="" placeholder="Nouvelle adresse mail">
                    <input type="submit" value="Valider" name="update-user_mail">
                </form>
                <form class="modif-tool pass-modif" method="POST">
                    <label for="">Nouveau mot de passe</label>
                    <input type="password" name="new-user_password" maxlength="20" id="new-user_password" placeholder="Nouveau mot de passe">
                    <input type="password" name="confirm_new-user_password" maxlength="20" id="confirm_new-user_password" placeholder="confirmer nouveau mdp">
                    <input type="submit" value="Valider" name="update-user_password">
                </form>
            </div>

        </section>
        <section id="sondageUser">
            <h3>Vos sondages en cours</h3>
            <hr align="left">
            <div id="Sondages">
                    <?php foreach($sondages as $sondage): if($sondage->sondage_statut == "en cours") 
                    { ?>
                        <a href="index.php?page=sondage&em&c=<?= htmlspecialchars($sondage->sondage_code) ?>">
                            <article>
                                <h4><?= htmlspecialchars($sondage->sondage_titre) ?></h4>
                                <p>temps restant : <?= htmlspecialchars($sondage->sondage_temps) ?></p>
                                <p>De : <?= htmlspecialchars($sondage->user_name) ?></p>
                            </article>
                        </a>
            <?php  } endforeach  ?>
            </div>
        </section>
    </main>

</body>
</html>