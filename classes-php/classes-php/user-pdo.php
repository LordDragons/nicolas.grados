<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classes";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}



class Userpdo{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public function __construct(){}
    public function register($login, $password, $email, $firstname, $lastname){}
    public function connect($login, $password){}
    public function disconnect(){}
    public function delete(){}
    public function update($login, $password, $email, $firstname, $lastname){}
    public function isConnected(){}
    public function getAllInfos(){}
    public function getLogin(){}
    public function getEmail(){}
    public function getFirstname(){}
    public function getLastname(){}
}