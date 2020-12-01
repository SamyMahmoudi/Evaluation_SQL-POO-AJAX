<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sondage.css">
</head>

<body>

    <header class="header-user">
        <?php include("inc/headerUser.php");?>
    </header>

    <main>

    <?php 
        foreach($sondages as $sondage) {
            echo '<h1>Titre du sondage : '.$sondage->sondage_titre.'</h1>';

            if($already == true){

                if($sondage->sondage_statut == "en cours"){
                    echo"<div class='alreadyRep'><p>Vous avez déjà répondu à ce sondage.</p><h2>SCORE ACTUEL :<h2>";
                    foreach ($reponses as $reponse) {
                        echo "<h3>".$reponse->reponse_titre." <span>SCORE: ".$reponse->reponse_score."</span></h3><br>";
                    }echo '</div>'; ?>
    <?php 
                } else {
                        echo "<div class='resultatSdg'><h2>Résultats du sondage de ".$sondage->user_name."</h2>";
                        foreach ($reponses as $reponse) {
                            echo "<h3>".$reponse->reponse_titre." <span>SCORE: ".$reponse->reponse_score."</span></h3><br>";
                        }
                } echo "</div>";
            } else {

                if ($sondage->sondage_statut == "en cours") { 
                    echo "<form class='reponseSdg' method='POST'> <ul>";
                        foreach($reponses as $reponse){
                            echo '<li><input type="radio" name="reponse" value="'.$reponse->reponse_titre.'">'.$reponse->reponse_titre.'</li>
                            <li>'.$reponse->reponse_score.'</li>';    
                        }
                    echo "<input type='submit' name='envoiRep' value='Envoyer sa réponse'></ul></form>"; 
                } else {
                    echo "<div class='resultatSdg'><h2>Résultats du sondage de ".$sondage->user_name."</h2>";
                    foreach ($reponses as $reponse) {
                        echo "<h3>".$reponse->reponse_titre." <span>SCORE: ".$reponse->reponse_score."</span></h3><br>";
                    }
                } echo "</div>";
            } 
        }    
    ?>
                        <section class="emailing">
    <?php 
                    if ($sondage->user_id == $_SESSION['userId']){
                        if (array_key_exists("em",$_GET)){           
                            switch ($_GET["em"]):
                                case '':
                                    echo "<a class='linkEmailing' href='?page=sondage&c=".$_GET['c']."&em=sendmails'> Cliquez ici pour envoyer un mail à tous vos amis !</a>";
                                break;
                                case 'sendmails':
                                    foreach ($amis as $ami ){
                                        if($ami->user_id != $_SESSION['userId']){
                                            $destinataire = $ami->user_mail;
                                            $username = $_SESSION['userName'];
                                            $objet = "Nouveau Sondage de ".$username."";
                                            $contenu = "<html><meta charset='UTF-8'><body><p>". $username ." t'invite à participer à son sondage. <br>  <a href='http://localhost/'>Clique sur ce lien</a> pour te connecter et répondre à ".$username." <br> (le lien renvoi actuellement sur la page d'accueil localhost)</p></body><html>";
                                            $headers[] = 'MIME-Version: 1.0';
                                            $headers[] = 'Content-type: text/html; charset=utf-8';
                                            mail($destinataire,$objet,$contenu,implode("\r\n", $headers));
                                            header("location:?page=sondage&c=".$_GET['c']."&em=end");
                                        }
                                    }
                                break;
                                case'end':
                                    echo "<p class='endEmailing'>Un mail a bien été envoyé à tous vos amis</p>";
                                break;
                                default:
                                    header("location:?page=sondage&c=".$_GET['c']."");
                                endswitch;
                        } 
                    }
    ?>
                    </section>
    </main>
</body>
</html>