<?php
// Inclure le modèle Book
require_once '../models/Book.php';

// Vérifier si l'ID du livre est passé en paramètre
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $bookModel = new Book($db); // Assurez-vous que $db est disponible
    $book = $bookModel->findById($bookId); // Récupérer le livre par ID

    // Si le livre n'existe pas, rediriger ou afficher une erreur
    if (!$book) {
        die("Livre non trouvé.");
    }
} else {
    die("ID de livre non spécifié.");
}
?>

 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Livre</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Lien vers votre CSS -->
</head>
<body>

<h1>Modifier le Livre</h1>

<form action="../controllers/BookController.php?action=edit&id=<?php echo $book->id; ?>" method="POST">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($book->title); ?>" required>

    <label for="author_id">Auteur :</label>
    <input type="number" name="author_id" id="author_id" value="<?php echo htmlspecialchars($book->author_id); ?>" required>

    <label for="genre">Genre :</label>
    <input type="text" name="genre" id="genre" value="<?php echo htmlspecialchars($book->genre); ?>" required>

    <label for="published_year">Année de publication :</label>
    <input type="number" name="published_year" id="published_year" value="<?php echo htmlspecialchars($book->published_year); ?>" required>

    <button type="submit">Mettre à jour</button>
</form>

<a href="../public/index.php">Retour à la liste des livres</a>

</body>
</html>
