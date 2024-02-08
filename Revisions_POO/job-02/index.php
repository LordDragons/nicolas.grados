<?php

class Category {
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct($id, $name, $description, $createdAt = null, $updatedAt = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt ? $createdAt : new DateTime();
        $this->updatedAt = $updatedAt ? $updatedAt : new DateTime();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        $this->updatedAt = new DateTime();
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        $this->updatedAt = new DateTime();
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }
}

class Product {
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    private $category_id;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt = null, $updatedAt = null, $category_id) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->updatedAt = $updatedAt ?? new DateTime();
        $this->category_id = $category_id;
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

    public function getCategoryId() {
        return $this->category_id;
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

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

}
?>
