<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../../Public/css/profil.css">
    <link rel="stylesheet" href="../../Public/css/pageAmis.css">
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
                    <a href="">Amis</a>
                </li>

            </ul>
        </nav>
    </header>

    <main class="main-amis">
        <section class="recherche-amis">
            <h1>Ajouter un ami</h1>
            <div>
                <input type="search" name="" id="" placeholder="rechercher un amis">
                <button type="submit"><img src="../../Public/images/icon-search.png" alt=""></button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Ajouter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td><button>Ajouter</button></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><button>Ajouter</button></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><button>Ajouter</button></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><button>Ajouter</button></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><button>Ajouter</button></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="listing-amis">
            <h1>Liste d'amis</h1>
            <table>
                <thead>
                    <tr>
                        <th>Amis</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td><button>Supprimer</button></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><button>Supprimer</button></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><button>Supprimer</button></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><button>Supprimer</button></td>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>

</body>

</html>