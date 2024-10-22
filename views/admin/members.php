<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Affichage des membres</title>
    </head>
    <body>
        <h1>Gestion des Membres</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Date d'Inscription</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?= $member['id'] ?></td>
                <td><?= $member['name'] ?></td>
                <td><?= $member['email'] ?></td>
                <td><?= $member['registration_date'] ?></td>
                <td>
                    <a href="/bibliotheque_app/public/admin/members/edit/<?= $member['id']?>">Modifier</a>
                    <a href="/bibliotheque_app/public/admin/members/delete/<?= $member['id']?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="/bibliotheque_app/public/admin/members/create">Ajouter un Membre</a>

        
    </body>
</html>
