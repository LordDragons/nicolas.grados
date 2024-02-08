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

    public function __construct($id, $name, $photos, $price, $description, $quantity, $createdAt = null, $updatedAt = null) {
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


 /*   
 class ImageDisplay {
        private $imagePath;
    
        public function __construct($imagePath) {
            $this->imagePath = $imagePath;
        }
    
        public function display() {
            $imageInfo = getimagesize($this->imagePath);
    
            if ($imageInfo) {
                $mimeType = $imageInfo['mime'];
                header("Content-type: $mimeType");
                readfile($this->imagePath);
            } else {
                echo "Erreur lors de la récupération des informations de l'image.";
            }
        }
    }
*/

    $product = new Product(1, 'T-shirt', ['t-shirt-viking.jpeg'], 10, 'A beautifulT-shirt Viking', 1000, new DateTime(), new DateTime());


echo $product;

/*$imagePath = 'C:\laragon\www\Revisions_POO\job-01\t-shirt-viking.jpeg';
$imageDisplay = new ImageDisplay($imagePath);
$imageDisplay->display();*/

