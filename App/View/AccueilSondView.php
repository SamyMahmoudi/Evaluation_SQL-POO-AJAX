<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="css/accueilSond.css">
</head>
<body>
    <nav class="nav-form">
        <ul>
            <li>
                <a href="index.php?">Accueil</a>
            </li>
            <li>
                <a href="index.php?page=inscription">Inscription</a>
            </li>
            <li>
                <a href="index.php?page=connexion">Connexion</a>
            </li>
        </ul>
    </nav>
    <main>
        <section>
            <h3>Les sondages de vos ami(e)s</h3>
            <hr align="left">
            <div id="Sondages">
                    <?php foreach($sondages as $sondage):
                        if($sondage->user_id !=  $_SESSION['userId']){ ?>
                        <a href="index.php?page=sondage" >
                        <article>
                        <h4><?= htmlspecialchars($sondage->sondage_titre) ?></h4>
                        <p>temps restant : <?= htmlspecialchars($sondage->sondage_temps) ?></p>
                        <p>De : <?= htmlspecialchars($sondage->user_name) ?></p>
                        </article>
                        </a>
                        <?php }endforeach  ?>
                
            </div>
        </section>
        <section>
            <h3>Vos sondages terminés</h3>
            <hr align="left">
            <div id="Sondages">
                    <?php foreach($sondages as $sondage):
                        if($sondage->user_id ==  $_SESSION['userId'] AND $sondage->sondage_statut == "termine"){ ?>
                        <a href="index.php?page=sondage" >
                        <article>
                        <h4><?= htmlspecialchars($sondage->sondage_titre) ?></h4>
                        <p>temps restant : <?= htmlspecialchars($sondage->sondage_temps) ?></p>
                        <p>De : <?= htmlspecialchars($sondage->user_name) ?></p>
                        </article>
                        </a>
                        <?php }endforeach  ?>
                
            </div>
        </section>
    </main>
</body>
</html>