<?php
// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "draft_shop";

// ID du produit à récupérer
$idProduit = 2;

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);

    // Configurer PDO pour générer des exceptions en cas d'erreur
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer le produit avec l'ID 2
    $sql = "SELECT * FROM product WHERE id = :id";
    // Préparer la requête
    $requete = $connexion->prepare($sql);

    // Binder les valeurs des paramètres
    $requete->bindParam(':id', $idProduit, PDO::PARAM_INT);

    // Exécuter la requête
    $requete->execute();

    // Récupérer les données sous forme de tableau associatif
    $produit = $requete->fetch(PDO::FETCH_ASSOC);

    // Afficher les données du produit
    print_r($produit);

} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$connexion = null;




class Product {
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    public function __construct($name, $price, $quantity, $description = "", $photos = array()) {
        $this->id = uniqid();  // Vous pouvez générer un ID unique comme cela, ou utiliser une autre méthode selon vos besoins.
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->photos = $photos;
        $this->createdAt = new DateTime(); // Utilisez la classe DateTime pour représenter les dates et heures.
        $this->updatedAt = new DateTime();
    }
}

// Création d'une nouvelle instance de la classe Product
$nouveauProduit = new Product(2, "watch", "" , 15, "A Waterproof watch", 2500);



?>