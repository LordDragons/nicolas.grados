<?php

class User
{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    private $bdd;

    public function __construct()
    {
        $this->id = 0;
        $this->login = "";
        $this->email = "";
        $this->firstname = "";
        $this->lastname = "";
        $this->bdd = new mysqli('localhost', 'root', '', 'classes');

        if ($this->bdd->connect_error) {
            die("Connection failed: " . $this->bdd->connect_error);
        }
    }

    public function register($login, $password, $email, $firstname, $lastname)
    {

        // Insérer l'utilisateur dans la base de données
        $query = "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->bdd->prepare($query);
        $stmt->bind_param("sssss", $login, $password, $email, $firstname, $lastname);
        $stmt->execute();


       // Créer une instance de la classe User avec les informations récupérées
       // $user = new User("Tom13", "azerty", "thomas@gmail.com", "Thomas", "DUPONT");

       return "Enregistrement réussi " . $firstname;
    }

    public function connect($login, $password)
    {

        $query = "SELECT * FROM utilisateurs WHERE login = ?";
        $stmt = $this->bdd->prepare($query);
        $stmt->bind_param("s", $login);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $this->id = $user ['id'];
                $this->login = $user['login'];
                $this->email = $user['email'];
                $this->firstname = $user['firstname'];
                $this->lastname = $user['lastname'];

                return true; // Connexion réussie
            }
        }

        return false; // Login ou mot de passe incorrect
    }

    public function disconnect()
    {
        // Mettre fin à la session
        session_destroy();
    }

    public function delete()
    {
        // Supprimer l'utilisateur de la base de données
        $query = "DELETE FROM utilisateurs WHERE id = ?";
        $stmt = $this->bdd->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();

        // Déconnecter l'utilisateur après suppression
        $this->disconnect();
    }
    public function update($login, $password, $email, $firstname, $lastname) {

        $query = "UPDATE utilisateurs SET login = ?, password = ?, email = ?, firstname = ?, lastname = ? WHERE id = ?";
        $stmt = $this->bdd->prepare($query);
        $stmt->bind_param("sssssi", $login, $password, $email, $firstname, $lastname, $this->id);
        $stmt->execute();

        // Mettre à jour les attributs de l'objet
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function isConnected() {
        // Vérifie si l'ID de l'utilisateur est défini
        return isset($this->id);
    }
   
    public function getAllInfos() {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
        ];
    }

    public function getLogin() {
        return $this->login;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }
}

$user = new User();

$userInfo = $user->getAllInfos();
$login = $user->getLogin();
$email = $user->getEmail();
$firstname = $user->getFirstname();
$lastname = $user->getLastname();


echo $userInfo;