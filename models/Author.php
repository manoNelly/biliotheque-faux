<?php
class Author {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM authors");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $bio) {
        $stmt = $this->db->prepare("INSERT INTO authors (name, bio) VALUES (:name, :bio)");
        $stmt->execute(['name' => $name, 'bio' => $bio]);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM authors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $bio) {
        $stmt = $this->db->prepare("UPDATE authors SET name = :name, bio = :bio WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'bio' => $bio]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM authors WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
