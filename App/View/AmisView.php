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
        <section class="recherche-amis">
            <h1>Ajouter un ami</h1>
            <form method="POST">
                <input type="search" name="search-user" id="" placeholder="rechercher un joueur">
                <button type="submit" name="valid-search-user"><img src="images/icon-search.png" alt="search-icon"></button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Ajouter</th>
                    </tr>
                </thead>
                <tbody>
                        <?php  
                        $pdo = new PDO ("mysql:host=localhost;dbname=sondapote","root","");
                            if (isset($_POST["valid-search-user"]))
                            {    if(empty($_POST["search-user"])){
                                header("Location:amisView.php");
                            } else {
                                $searchQuery = $pdo->query("SELECT user_name,user_id FROM t_users WHERE user_name LIKE '%".$_POST["search-user"]."%'");
                                // $searchQuery->execute(array($_POST["search-user"]));
                                $resultSearch = $searchQuery->fetchAll();
                                foreach($resultSearch as $sch): 
                                    echo "<tr><td>".$sch["user_name"]."</td><td><button type='submit'>Ajouter</button></td></tr>";
                                endforeach;
                                }
                            }
                        ?>

                         
                        

                </tbody>
            </table>
        </section>

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
                <?php foreach($amis as $ami):?>
                    <tr>
                        <?= "<td>".$ami->user_name."</td>" ?>
                        <td><button type="submit">Supprimer</button></td>
                    </tr>
                    <?php endforeach ?>
                    
                    </tr>
                </tbody>
            </table>
        </form>

    </main>

</body>

</html>