<?php
class Member {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM members");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $password) {
        $registration_date = date('Y-m-d'); // Date d'inscription actuelle
        $stmt = $this->db->prepare("INSERT INTO members (name, email, password, registration_date) VALUES (:name, :email, :password, :registration_date)");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'registration_date' => $registration_date
        ]);
    }
    

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM members WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $email) {
        $stmt = $this->db->prepare("UPDATE members SET name = :name, email = :email WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM members WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    //Méthode qui gère la connexion des membres dans le système
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM members WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
