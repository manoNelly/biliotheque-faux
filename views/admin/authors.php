<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Affichage des auteurs</title>
    </head>
    <body>
        <h1>Gestion des Auteurs</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Biographie</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($authors as $author): ?>
            <tr>
                <td><?= $author['id'] ?></td>
                <td><?= $author['name'] ?></td>
                <td><?= $author['bio'] ?></td>
                <td>
                    <a href="edit_author.php?id=<?= $author['id'] ?>">Modifier</a>
                    <a href="delete_author.php?id=<?= $author['id'] ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="/bibliotheque_app/public/admin/authors/create">Ajouter un Auteur</a>

        
    </body>
</html>