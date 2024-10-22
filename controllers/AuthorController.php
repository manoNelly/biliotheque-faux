<?php
require '../models/Author.php';

class AuthorController {
    private $authorModel;

    public function __construct($db) {
        $this->authorModel = new Author($db);
    }

    public function index() {
        $authors = $this->authorModel->findAll();
        include '../views/admin/authors.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $bio = $_POST['bio'];
            $this->authorModel->create($name, $bio);
            header('Location: /bibliotheque_app/public/admin/authors');
            exit;
        }
        include '../views/admin/add_author.php'; // Crée cette vue pour le formulaire d'ajout
    }
    
    public function edit($id) {
        $author = $this->authorModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $bio = $_POST['bio'];
            $this->authorModel->update($id, $name, $bio);
            header('Location: /bibliotheque_app/public/admin/authors');
            exit;
        }
        require '../views/admin/edit_author.php'; // Crée cette vue pour le formulaire d'édition
    }
    
    public function delete($id) {
        $this->authorModel->delete($id);
        header('Location: /bibliotheque_app/public/admin/authors');
        exit;
    }
    
}
?>
