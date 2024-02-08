-- Création de la base de données
CREATE DATABASE IF NOT EXISTS draft_shop;

-- Sélection de la base de données
USE draft_shop;

-- Création de la table 'category'
CREATE TABLE IF NOT EXISTS category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    createdAt DATETIME NOT NULL,
    updatedAt DATETIME NOT NULL
);

-- Création de la table 'product'
CREATE TABLE IF NOT EXISTS product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    photos JSON NOT NULL,
    price INT NOT NULL,
    description TEXT,
    quantity INT NOT NULL,
    createdAt DATETIME NOT NULL,
    updatedAt DATETIME NOT NULL
);

<?php

class Product {
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    public function __construct($id = null, $name = null, $photos = null, $price = null, $description = null, $quantity = null, $createdAt = null, $updatedAt = null) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->updatedAt = $updatedAt ?? new DateTime();
    }

    public function updateQuantity($newQuantity) {
        $this->quantity = $newQuantity;
        $this->updatedAt = new DateTime();
    }

    public function updatePrice($newPrice) {
        $this->price = $newPrice;
        $this->updatedAt = new DateTime();
    }

    //**************** Méthodes Getter 

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhotos() {
        return $this->photos;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

     //************** Méthodes Setter

     public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPhotos($photos) {
        $this->photos = $photos;
    }

    public function setPrice($price) {
        $this->price = $price;
        $this->updatedAt = new DateTime();
    }

    public function setDescription($description) {
        $this->description = $description;
        $this->updatedAt = new DateTime();
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        $this->updatedAt = new DateTime();
    }

    public function __toString() {
        $photosAsString = implode(', ', $this->photos);
        return "Product: ID={$this->id}, Name={$this->name}, Photos={$photosAsString}, Price={$this->price}, Quantity={$this->quantity}";
    }

}
$product1 = new Product(1, 'T-shirt', ['t-shirt-viking.jpeg'], 10, 'A beautifulT-shirt Viking', 1000, new DateTime(), new DateTime());

$product2 = new Product();