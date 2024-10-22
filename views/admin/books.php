<?php

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=bibliotheque_gestion', 'root', '');
$bookModel = new Book($db);

// Récupérer tous les livres
$books = $bookModel->findAll();
?>

<h1>Liste des Livres</h1>
<table>
    <tr>
        <th>#id</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Genre</th>
        <th>Année de publication</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?= htmlspecialchars($book['id']) ?></td>
        <td><?= htmlspecialchars($book['title']) ?></td>
        <td><?= htmlspecialchars($book['author_id']) ?></td>
        <td><?= htmlspecialchars($book['genre']) ?></td>
        <td><?= htmlspecialchars($book['published_year']) ?></td>
        <td>
            <a href="/bibliotheque_app/public/admin/books/edit/<?= $book['id'] ?>">Modifier</a>
            <a href="/bibliotheque_app/public/admin/books/delete/<?= $book['id'] ?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="/bibliotheque_app/public/admin/books/create">Ajouter un Livre</a>
