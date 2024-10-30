<?php
class Book {
    private $db;

    public function __construct($databaseConnection) {
        $this->db = $databaseConnection;
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO books (title, author_id, genre, published_year) VALUES (:title, :author_id, :genre, :published_year)");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE books SET title = :title, author_id = :author_id, genre = :genre, published_year = :published_year WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

     // Récupérer tous les livres avec l'information de l'auteur
     public function findAllWithAuthor() {
        $stmt = $this->db->query("
            SELECT books.id, books.title, authors.name AS author, books.genre, books.published_year
            FROM books
            INNER JOIN authors ON books.author_id = authors.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
