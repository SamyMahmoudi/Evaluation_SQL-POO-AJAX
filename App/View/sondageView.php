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
     <?php
        foreach($sondages as $sondage){
            echo '<h1>'.$sondage->sondage_titre.'</h1>';
        }
        
     
     
     ?>
     <ul>
     <?php
     foreach($reponses as $reponse){
         
        echo '<li><input type="radio" name="reponse">'.$reponse->reponse_titre.'</input></li>';
     }
     
     ?>
     </ul>
    </main>
</body>

</html>