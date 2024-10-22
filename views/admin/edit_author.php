<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification des auteurs</title>
    </head>
    <body>
        <h1>Modifier un Auteur</h1>
        <form method="POST">
            <label>Nom :</label>
            <input type="text" name="name" value="<?= $author['name'] ?>" required>
            <label>Biographie :</label>
            <textarea name="bio" required><?= $author['bio'] ?></textarea>
            <button type="submit">Modifier</button>
        </form>
        <a href="/bibliotheque_app/public/admin/authors">Retour</a>



        
    </body>
</html>