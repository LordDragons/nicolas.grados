<?php
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'draft_shop';

    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
        error_log("Database Connection Error: " . $e->getMessage());
        die("Database connection error.");
    }
}

    public function executeQuery($query, $params = array())
    {
        $statement = $this->db->prepare($query);

        try {
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
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
    private $id_category; // Ajoutez la propriété id_category

    public function getCategory() {
       
        $category = new Category($this->id_category, $this->name, $this->description);

      return $category;
    }

    public function findOneById(int $id){
        $db = new Database();

        $query = "SELECT * FROM Product WHERE id = :id";
        $params = array(':id' => $id);

        try {
            $result = $db->executeQuery($query, $params);
            
        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row) {
               
                $this->id = $row['id'];
                $this->name = $row['name'];
                $this->photos = $row['photos'];
                $this->price = $row['price'];
                $this->description = $row['description'];
                $this->quantity = $row['quantity'];
                $this->createdAt = $row['created_at'];
                $this->updatedAt = $row['updated_at'];
                $this->id_category = $row['id_category'];

                return $this; 
            } else {
                return null; 
            }
        } else {
            return false;
        }
    } catch (PDOException $e) {
        error_log("Product Query Error: " . $e->getMessage());
        die("Product query error.");
    }
}

}
     
$product = new Product();


$productFound = $product->findOneById($productId);


if ($productFound !== '') {
  
} else {
    
    echo "Product not found or an error occurred.";
}
