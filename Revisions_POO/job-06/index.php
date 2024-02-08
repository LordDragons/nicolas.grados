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
    private $id_category; // Ajoutez la propriété id_category


    // Ajoutez la méthode getCategory
    public function getCategory() {
        // Supposons que Category soit une classe existante
        $category = new Category($this->id_category, $this->name, $this->description);

      return $category;
    }
}

// Exemple de classe Category (à adapter selon votre implémentation)
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

/*
SELECT Catégory.Name
FROM Catégory
JOIN Product ON Catégory.ID = Product.ID_Catégory
WHERE Product.ID = 2;
*/

?>