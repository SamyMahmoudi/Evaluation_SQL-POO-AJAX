<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/.css">
</head>

<body>
    <header class="header-user">
        <?php include("inc/headerUser.php");?>
    </header>
    <main>
        <?php foreach($sondages as $sondage){
                echo '<h1>'.$sondage->sondage_titre.'</h1>';
            }
        ?>
        <ul>
            <?php
                // $nextTime =time() +(15*60)  ;
                // echo date("d-m-Y H:i:s")."<br>";
                foreach($reponses as $reponse){
                    echo '<li><input type="radio" name="reponse">'.$reponse->reponse_titre.'</li>';    
                }
            ?>
        </ul>

        <section class="emailing">
            <?php 
        //systeme emailing 
                if (array_key_exists("em",$_GET))
                {
                    switch ($_GET["em"]):
                        case '':
                            echo "<a href ='?page=sondage&c=".$_GET['c']."&em=sendmails'> Cliquez ici pour envoyer un mail à tous vos amis !</a>";
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
                            echo "<p>Un mail a bien été envoyé à tous vos amis</p>";
                        break;

                        default:
                            header("location:?page=sondage&c=".$_GET['c']."");
                    endswitch;
                }          
            ?> 
        </section>

        <!-- <span id="minutes">00</span>:<span id="seconds">00</span> -->

        <!-- <script>
            const minutes = document.querySelector("#minutes")
            const seconds = document.querySelector("#seconds")
            let count = 0;
            const renderTimer = () => {
                count += 1;
                minutes.innerHTML = Math.floor(count / 60).toString().padStart(2, "0");
                seconds.innerHTML = (count % 60).toString().padStart(2, "0");
            }
            const timer = setInterval(renderTimer, 1000)
        </script> -->

    </main>
</body>
</html>