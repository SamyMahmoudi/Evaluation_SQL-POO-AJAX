<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/accueilSond.css">
</head>

<body>
    <header class="header-user">
        <?php include("inc/headerUser.php");?>
    </header>
    <main>

    <!---------- PARTIE SONDAGE AMIS ---------->
        <section>
            <h3>Les sondages de vos ami(e)s</h3>
            <hr align="left">
            <div id="Sondages">
                <?php foreach($sondagesFriends as $sondage):      
                        if($sondage->user_id !=  $_SESSION['userId']) { ?>
                        <a href="index.php?page=sondage&c=<?=htmlspecialchars($sondage->sondage_code) ?>">
                            <article>
                                <h4><?= htmlspecialchars($sondage->sondage_titre) ?></h4>
                                <p>temps restant : <?= htmlspecialchars($sondage->sondage_temps) ?></p>
                                <p>De : <?= htmlspecialchars($sondage->user_name) ?></p>
                            </article>
                        </a>
                <?php } endforeach  ?>

            </div>
        </section>
    
    <!---------- PARTIE SONDAGE TERMINES DU USER ---------->
        <section>
            <h3>Vos sondages terminés</h3>
            <hr align="left">
            <div id="Sondages">
                <?php 
                    foreach($sondagesUser as $sondage): if($sondage->sondage_statut == "Finish"){  ?>
                        <a href="index.php?page=sondage&c=<?=htmlspecialchars($sondage->sondage_code) ?>">
                            <article>
                                <h4><?= htmlspecialchars($sondage->sondage_titre) ?></h4>
                                <p>temps restant : <?= htmlspecialchars($sondage->sondage_temps) ?></p>
                                <p>De : <?= htmlspecialchars($sondage->user_name) ?></p>
                            </article>
                        </a>
                <?php } endforeach  ?>
            </div>
        </section>

    </main>
</body>
</html>