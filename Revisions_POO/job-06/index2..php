<?php
class Category {
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function getProducts() {
        // Supposons que Database soit une classe pour la connexion à la base de données
        $db = new Database();

        // Remplacez les champs et les tables par ceux de votre base de données
        $query = "SELECT * FROM Product WHERE id_category = :id_category";
        $params = array(':id_category' => $this->id);

        $result = $db->executeQuery($query, $params);

        $products = array();

        foreach ($result as $row) {
            // Créer une instance de la classe Product pour chaque résultat de la base de données
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setPhotos($row['photos']);
            $product->setPrice($row['price']);
            $product->setDescription($row['description']);
            $product->setQuantity($row['quantity']);
            $product->setCreatedAt(new DateTime($row['created_at']));
            $product->setUpdatedAt(new DateTime($row['updated_at']));
            $product->setIdCategory($row['id_category']); // Assurez-vous que la classe Product a une méthode setIdCategory

            $products[] = $product;
        }

        return $products;
    }
}
?>
<?php
class Product {
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $CreatedAt;
    private $UpdatedAt;
    private $id_category;
    

    public function setIdCategory($id_category) {
        $this->id_category = $id_category;
    }
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }
    public function __construct() {
        $this->createdAt = new DateTime();
    }
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }
}
?>
<?php
class Database {
    private $host = 'votre_hote';
    private $user = 'votre_utilisateur';
    private $password = 'votre_mot_de_passe';
    private $database = 'votre_base_de_donnees';

    private $connection;

    public function __construct() {
        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, $params = array()) {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

