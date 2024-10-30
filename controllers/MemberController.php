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

    //--------Fontionnalité concernant le système d'inscription et de connexion des membres-----

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashage du mot de passe
            $this->memberModel->create($name, $email, $password); // Utilisation de la méthode mise à jour
            header('Location: /bibliotheque_app/public/members/login');
            exit;
        }
        include '../views/members/register.php';
    }
    
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données POST
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Vérification que les champs ne sont pas vides
            if (empty($email) || empty($password)) {
                $error = "Veuillez remplir tous les champs.";
                include '../views/members/login.php'; // Chemin de la vue mis à jour
                return; // Sortir pour éviter de continuer
            }
    
            // Recherche du membre par email
            $member = $this->memberModel->findByEmail($email);
    
            // Vérification du mot de passe et de l'existence du membre
            if ($member && password_verify($password, $member['password'])) {
                // Démarrer la session et enregistrer l'ID du membre
                session_start();
                $_SESSION['member_id'] = $member['id'];
    
                // Redirection vers le tableau de bord du membre
                header('Location: /bibliotheque_app/public/members/books');
                exit;
            } else {
                // Gestion des erreurs d'identifiants incorrects
                $error = "Identifiants invalides.";
            }
        }
    
        // Inclure la vue de connexion avec éventuellement un message d'erreur
        include '../views/members/login.php'; // Chemin de la vue mis à jour
    }
    
    
    
}
?>
