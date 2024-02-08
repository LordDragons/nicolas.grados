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
        $this->db = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, $params = array())
    {
        $statement = $this->db->prepare($query);

        try {
            $statement->execute($params);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}


$db = new Database();
$query = "INSERT INTO Product(name, price, description, quantity, created_at, updated_at) VALUES ('merdouille' ,1504 , 'superbe merdouille a ne pas louper' , 3200, NOW(), NOW())";

if ($db->executeQuery($query)) {
    echo "Nouveau enregistrement réussi";
} else {
    echo "Impossible";
}

