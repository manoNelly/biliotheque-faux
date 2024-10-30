<?php
require '../controllers/BookController.php';
require '../controllers/AuthorController.php';
require '../controllers/MemberController.php';

$db = new PDO('mysql:host=localhost;dbname=bibliotheque_gestion', 'root', '');
$bookController = new BookController($db);
$authorController = new AuthorController($db);
$memberController = new MemberController($db);

// Vérifier la route
$url = isset($_GET['url']) ? $_GET['url'] : '';

switch ($url) {
    case '':
        echo '<h1>Bienvenue dans l\'interface d\'administration</h1>';
        echo '<ul>';
        echo '<li><a href="/bibliotheque_app/public/admin/books">Gérer les livres</a></li>';
        echo '<li><a href="/bibliotheque_app/public/admin/authors">Gérer les auteurs</a></li>';
        echo '<li><a href="/bibliotheque_app/public/admin/members">Gérer les membres</a></li>';
        echo '<li><a href="/bibliotheque_app/public/members/register">S\'inscrire</a></li>';
        echo '<li><a href="/bibliotheque_app/public/members/login">Se connecter</a></li>';
        echo '</ul>';
        break;

    // Les routes concernant les fonctionnalités admin
    case 'admin/books':
        $bookController->index();
        break;

    case 'admin/books/create':
        $bookController->create();
        break;

    case (preg_match('/^admin\/books\/edit\/(\d+)$/', $url, $matches) ? true : false):
        $bookController->edit($matches[1]);
        break;

    case (preg_match('/^admin\/books\/delete\/(\d+)$/', $url, $matches) ? true : false):
        $bookController->delete($matches[1]);
        break;

    case 'admin/authors':
        $authorController->index();
        break;

    case 'admin/authors/create':
        $authorController->create();
        break;

    case (preg_match('/^admin\/authors\/edit\/(\d+)$/', $url, $matches) ? true : false):
        $authorController->edit($matches[1]);
        break;

    case (preg_match('/^admin\/authors\/delete\/(\d+)$/', $url, $matches) ? true : false):
        $authorController->delete($matches[1]);
        break;

    case 'admin/members':
        $memberController->index();
        break;

    case 'admin/members/create':
        $memberController->create();
        break;

    case (preg_match('/^admin\/members\/edit\/(\d+)$/', $url, $matches) ? true : false):
        $memberController->edit($matches[1]);
        break;

    case (preg_match('/^admin\/members\/delete\/(\d+)$/', $url, $matches) ? true : false):
        $memberController->delete($matches[1]);
        break;

    // Les routes concernant les fonctionnalités de members
    case 'members/register':
        $memberController->register(); // Utilise la méthode register pour l'inscription
        break;

    case 'members/login':
        $memberController->login(); // Affiche le formulaire de connexion
        break;

    case 'members/logout':
        $memberController->logout(); // Déconnexion
        break;
    
        // Ajout de la route pour afficher les livres aux membres
    case 'members/books':
        $bookController->memberIndex(); // Affiche la liste des livres pour les membres
        break;

    default:
        echo '<h1>404 - Page non trouvée</h1>';
        break;
}

?>
