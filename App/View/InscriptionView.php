<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/inscription.css">
</head>

<body class="body-inscription">

    <nav class="nav-form">
        <ul>
            <li>
                <a href="index.php?">Accueil</a>
            </li>
            <li>
                <a href="index.php?page=inscription">Inscription</a>
            </li>
            <li>
                <a href="index.php?page=Connexion">Connexion</a>
            </li>
        </ul>
    </nav>

    

    <div class="main-inscription">
        <form method="POST" id="form-inscription" >

            <h1>Formulaire d'inscription</h1>

            <input type="text" name="username" placeholder="entrez votre nom d'utilisateur" >
            <input type="email" name="email" placeholder="entrez votre adresse mail" >
            <input type="password" name="mdpasse" placeholder="entrez un mot de passe" >
            <input type="password" name="confirm" placeholder="validez le mot de passe">
            <input type="submit" name="valid" value="S'inscrire">

        </form>
        
    </div>


</body>

</html>