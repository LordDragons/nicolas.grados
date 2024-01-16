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
        $this->id = "";
        $this->login = "";
        $this->email = "";
        $this->firstname = "";
        $this->lastname = "";

        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function register($login, $password, $email, $firstname, $lastname)
    {
        try {
            $query = "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->bdd->prepare($query);
            $stmt->execute([$login, $password, $email, $firstname, $lastname]);

            return "Enregistrement réussi " . $firstname;
        } catch (PDOException $e) {
            return "Erreur lors de l'enregistrement : " . $e->getMessage();
        }
    }

    public function connect($login, $password)
    {
        try {
            $query = "SELECT * FROM utilisateurs WHERE login = ?";
            $stmt = $this->bdd->prepare($query);
            $stmt->execute([$login]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $this->id = $user['id'];
                $this->login = $user['login'];
                $this->email = $user['email'];
                $this->firstname = $user['firstname'];
                $this->lastname = $user['lastname'];

                return true; // Connexion réussie
            }

            return false; // Login ou mot de passe incorrect
        } catch (PDOException $e) {
            return "Erreur lors de la connexion : " . $e->getMessage();
        }
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
        $stmt->execute();

        // Déconnecter l'utilisateur après suppression
        $this->disconnect();
    }
    public function update($login, $password, $email, $firstname, $lastname) {

        $query = "UPDATE utilisateurs SET login = ?, password = ?, email = ?, firstname = ?, lastname = ? WHERE id = ?";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([$login, $password, $email, $firstname, $lastname, $this->id]);

        // Mettre à jour les attributs de l'objet
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function isConnected() {
        // Vérifie si l'ID de l'utilisateur est défini
        return !empty($this->id);
    }
   
    public function getAllInfos()
{
    $query = "SELECT * FROM utilisateurs";
    $stmt = $this->bdd->prepare($query);
    $stmt->execute();

    $userInfos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $userInfos;
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

$userInfos = $user->getAllInfos();

echo "Informations de l'utilisateur : <br>";
foreach ($userInfos as $userInfo) {
    echo "ID : " . $userInfo['id'] . "<br>";
    echo "Login : " . $userInfo['login'] . "<br>";
    echo "Email : " . $userInfo['email'] . "<br>";
    echo "Prénom : " . $userInfo['firstname'] . "<br>";
    echo "Nom : " . $userInfo['lastname'] . "<br>";
    echo "<br>";
}