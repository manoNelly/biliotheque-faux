<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout des membres</title>
    </head>
    <body>
        <h1>Ajouter un Membre</h1>
        <form method="POST" action="/bibliotheque_app/public/admin/members/create">
            <label>Nom :</label>
            <input type="text" name="name" required>
            <label>Email :</label>
            <input type="email" name="email" required>
            <label>Date d'Inscription :</label>
            <input type="date" name="registration_date" required>
            <button type="submit">Ajouter</button>
        </form>
        <a href="/bibliotheque_app/public/admin/members">Retour</a>

        
    </body>
</html>