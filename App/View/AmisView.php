<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/pageAmis.css">
</head>

<body>
    <header>
        <nav class="nav-user">
            <ul>
                <li>
                    <a href="">Accueil</a>
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

    <main class="main-amis">

        <form class="listing-amis" method="POST">
            <h1>Liste d'amis</h1>
            <table>
                <thead>
                    <tr>
                        <th>Amis</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                        
                <!-- Liste d'amis avec possibilité de supprimer -->
                <?php 
                    foreach($amis as $ami){
                        if($ami->user_id != $_SESSION['userId']){
                            echo "<tr><td>". $ami->user_name."</td><td><a href='?page=amis&delete=".$ami->friendship_id."'>Supprimer l'ami(e)</a></td></tr>";
                            $userCheck[] = $ami->user_id;
                        } 
                    }
                ?>
                
                </tbody>
            </table>
        </form>

        <section class="recherche-amis">
            <h1>Recherche utilisateurs</h1>
            <form method="POST">
                <input type="search" name="search-user" id="" placeholder="rechercher un joueur">
                <button type="submit" name="valid-search-user"><img src="images/icon-search.png" alt="search-icon"></button>
            </form>
            <form action="POST">
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Ajouter</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- data recup from search request -->
                    <?php 
                        if(isset($_POST["valid-search-user"]))
                        {
                            foreach($resultSearch as $sch){ 
                                if (in_array($sch->user_id,$userCheck)) {
                                    if ($sch->user_id == $_SESSION['userId'])
                                    echo "<tr><td>". $sch->user_name."</td><td class='userResult'>Vous</tr>";
                                    else {
                                        echo "<tr><td>". $sch->user_name."</td><td>Ami(e)</tr>"; 
                                    }
                                } else { 
                                    echo "<tr><td>". $sch->user_name."</td>
                                    <td><a href='?page=amis&ajouter=".$sch->user_id."'>Ajouter en ami</a></td>
                                    </tr>";
                                }
                            }    
                        }
                    ?> 
                </tbody>
            </table></form>
        </section>

    </main>

</body>

</html>