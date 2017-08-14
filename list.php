<?php
include ('connect.php');
include ('menu_admin.html');

// Récupération du contenu de la table
$req = $bdd->query('SELECT id, titre, DATE_FORMAT(date_creation, \'[%d-%m-%Y à %Hh%im%ss]\')  AS date_creation, 
                    DATE_FORMAT(date_maj, \'[%d-%m-%Y à %Hh%im%ss]\') AS date_maj FROM post ORDER BY date_maj, date_creation DESC');
?>

<div class="col-sm-10">
    <h1 class="text-center">Liste des messages</h1>
    <h2 class="text-center">Modifier ou supprimer</h2>

    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table class="table table-striped table-condesed">
                <thead>
                    <tr>
                        <th>Titre</th> <th>Cr&#233;&#233; le</th> <th>Modifié le</th> <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <!-- Boucle affichage -->
                <?php
                while ($ligne = $req->fetch())
                    {
                        echo '<tr> <td>' . htmlspecialchars($ligne['titre']) . '</td><td>' . htmlspecialchars($ligne['date_creation']) .
                        '</td><td>' . htmlspecialchars($ligne['date_maj']) . '</td>
                        <td><div class="btn-group">
                            <a class="btn btn-primary btn-sm" href="update.php?id=' . $ligne['id'] . ' ">Modifier</a>
                            <a class="btn btn-danger btn-sm"  href="delete.php?id=' . $ligne['id'] . ' ">Supprimer</a>
                            </div> 
                        </td> </tr> <br/>';
                    }

                    $req->closeCursor();
                ?>
                        <!-- Fin boucle -->

                    
                </tbody>
            </table>

        </div>
    </div>
</div>
