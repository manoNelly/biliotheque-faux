<?php
// Inclure le modèle Member si nécessaire (selon la structure de ton projet)
require_once '../models/Member.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Membre</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Lien vers votre CSS -->
</head>
<body>

<h1>Modifier le Membre</h1>

<form action="/bibliotheque_app/public/admin/members/edit/<?= $member['id'] ?>" method="POST">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($member['name']); ?>" required>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($member['email']); ?>" required>

    <label for="registration_date">Date d'inscription :</label>
    <input type="date" name="registration_date" id="registration_date" value="<?php echo htmlspecialchars($member['registration_date']); ?>" required>

    <button type="submit">Mettre à jour</button>
</form>

<a href="/bibliotheque_app/public/admin/members">Retour à la liste des membres</a>

</body>
</html>
