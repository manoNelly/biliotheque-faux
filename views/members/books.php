<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Livres</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>

<h1>Liste des Livres Disponibles</h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Genre</th>
            <th>Année de Publication</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td><?php echo htmlspecialchars($book['genre']); ?></td>
                <td><?php echo htmlspecialchars($book['published_year']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/bibliotheque_app/public/members/dashboard">Retour au tableau de bord</a>

</body>
</html>
