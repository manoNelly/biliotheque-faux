<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification des membres</title>
    </head>
    <body>
        <h1>Modifier un Membre</h1>
        <form method="POST">
            <label>Nom :</label>
            <input type="text" name="name" value="<?= $member['name'] ?>" required>
            <label>Email :</label>
            <input type="email" name="email" value="<?= $member['email'] ?>" required>
            <button type="submit">Modifier</button>
        </form>
        <a href="/bibliotheque_app/public/admin/members">Retour</a>


        
    </body>
</html>