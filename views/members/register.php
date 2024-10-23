<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>

<h1>Inscription</h1>

<form action="/bibliotheque_app/public/members/register" method="POST">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">S'inscrire</button>
</form>

<a href="/bibliotheque_app/public/members/login">Déjà un compte ? Connexion</a>

</body>
</html>
