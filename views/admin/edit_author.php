<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'Auteur</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Lien vers votre CSS -->
</head>
<body>

<h1>Modifier l'Auteur</h1>

<form action="/bibliotheque_app/public/admin/authors/edit/<?= $author['id'] ?>" method="POST">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($author['name']) ?>" required>

    <label for="bio">Biographie :</label>
    <textarea name="bio" id="bio" required><?= htmlspecialchars($author['bio']) ?></textarea>

    <button type="submit">Mettre à jour</button>
</form>

<a href="/bibliotheque_app/public/admin/authors">Retour à la liste des auteurs</a>

</body>
</html>

