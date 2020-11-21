<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer votre sondage</title>
    <link rel="stylesheet" href="css/creaSond.css">
    <script src="script/creaSond.js"></script>
</head>
<body>
    <header>
        <h1>SondaPote</h1>
        <nav>
            <ul>
                <li>Sondage</li>
                <li>Créer votre sondage</li>
                <li>Profil</li>
                <li>Inscription</li>
            </ul>
        </nav>
    </header>
    <main>
        <form id="sondage" method="POST">
            <div id="intitule">
                <label for="">Intitulé de la question</label>
                <input type="text" name="titre">
            </div>
            <div id="reponses">
            <div class="reponse">
                <label for="">Réponse 1</label>
                <input type="text" name="reponse1">
            </div>
            <div class="reponse">
                <label for="">Réponse 2</label>
                <input type="text" name="reponse2">
            </div>
            </div>
            <div class="reponse">
                <label for="">Temps pour répondre (en minutes) :</label>
                <select name="temps" id="">
                    <option value="15">15</option>
                    <option value="45">45</option>
                    <option value="60">60</option>
                    <option value="90">90</option>
                </select>
            </div>
            <div id="bouttons">
            
            <button class="button" name="valid">Valider le questionnaire</button>
            </div>
        </form>
        <button onclick="ajout()" class="button">Ajouter une réponse</button>
    </main>
    <footer>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Ipsam eum ab sunt unde, ad eaque maxime labori</p>
    </footer>
</body>
</html>