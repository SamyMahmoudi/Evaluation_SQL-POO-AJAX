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
        <section id="sondage">
            <div id="intitule">
                <label for="">Intitulé de la question</label>
                <input type="text">
            </div>
            <div id="reponses">
            <div class="reponse">
                <label for="">Réponse 1</label>
                <input type="text">
            </div>
            <div class="reponse">
                <label for="">Réponse 2</label>
                <input type="text">
            </div>
            </div>
            <div id="bouttons">
            <button onclick="ajout()" class="button">Ajouter une réponse</button>
            <button class="button">Valider le questionnaire</button>
            </div>
        </section>
    </main>
    <footer>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Ipsam eum ab sunt unde, ad eaque maxime labori</p>
    </footer>
</body>
</html>