<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>

<h1>Connexion</h1>

<form action="/bibliotheque_app/public/members/login" method="POST">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Se connecter</button>
</form>

<a href="/bibliotheque_app/public/members/register">Pas encore inscrit ? Inscription</a>

</body>
</html>
