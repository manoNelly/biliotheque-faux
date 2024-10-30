<?php
require '../models/Book.php';

class BookController {
    private $bookModel;

    public function __construct($db) {
        $this->bookModel = new Book($db);
    }

    public function index() {
        $books = $this->bookModel->findAll();
        require '../views/admin/books.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->bookModel->create($_POST);
            header("Location: /bibliotheque_app/public/admin/books");
        } else {
            require '../views/admin/add_book.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->bookModel->update($id, $_POST);
            header("Location: /bibliotheque_app/public/admin/books");
        } else {
            $book = $this->bookModel->findById($id);
            require '../views/admin/edit_book.php';
        }
    }

    public function delete($id) {
        $this->bookModel->delete($id);
        header("Location: /bibliotheque_app/public/admin/books");
    }

     // Méthode pour afficher les livres aux membres
     public function memberIndex() {
        // Utiliser la méthode pour obtenir les livres avec l'auteur
        $books = $this->bookModel->findAllWithAuthor();
        require '../views/members/books.php'; // Vue pour les membres
    }
}
?>
