<?php
require '../models/Member.php';

class MemberController {
    private $memberModel;

    public function __construct($db) {
        $this->memberModel = new Member($db);
    }

    public function index() {
        $members = $this->memberModel->findAll();
        include '../views/admin/members.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $registration_date = $_POST['registration_date'];
            $this->memberModel->create($name, $email, $registration_date);
            header('Location: /bibliotheque_app/public/admin/members');
            exit;
        }
        include '../views/admin/add_member.php'; // Crée cette vue pour le formulaire d'ajout
    }
    
    public function edit($id) {
        $member = $this->memberModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->memberModel->update($id, $name, $email);
            header('Location: /bibliotheque_app/public/admin/members');
            exit;
        }
        require '../views/admin/edit_member.php'; // Crée cette vue pour le formulaire d'édition
    }
    
    public function delete($id) {
        $this->memberModel->delete($id);
        header('Location: /bibliotheque_app/public/admin/members');
        exit;
    }
    
}
?>
