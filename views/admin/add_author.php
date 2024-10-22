<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout des auteurs</title>
    </head>
    <body>
        <h1>Ajouter un Auteur</h1>
        <form method="POST" action="/bibliotheque_app/public/admin/authors/create">
            <label>Nom :</label>
            <input type="text" name="name" required>
            <label>Biographie :</label>
            <textarea name="bio" required></textarea>
            <button type="submit">Ajouter</button>
        </form>
        <a href="/bibliotheque_app/public/admin/authors">Retour</a>


        
    </body>
</html>