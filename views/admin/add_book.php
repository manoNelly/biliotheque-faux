<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire ajout de livre</title>
    </head>
    <body>
        <h1>Ajouter un Livre</h1>
        <form method="POST" action="/bibliotheque_app/public/admin/books/create">
            <input type="text" name="title" placeholder="Titre" required>
            <input type="number" name="author_id" placeholder="ID de l'auteur" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <input type="number" name="published_year" placeholder="Année de publication" required>
            <button type="submit">Ajouter</button>
        </form>
        <a href="/bibliotheque_app/public/admin/books">Retour</a>



        
    </body>
</html>