<?php
include_once "AbstractDao.php";
include_once "Database/ProductDao.php";
include_once "objects/product.php";
class DatabaseProductDao extends AbstractDao implements ProductDao
{
    public $conn;

    public function __construct()
    {
        $this->conn = parent::getConnection();
    }

    public function GetAll()
    {
        try {
            $productsList = array();
            $sql = "SELECT product_id, product_name, brand, specification, description, 
                           quantity, price, image, category FROM products";
            $row = $this->conn->query($sql);
            $row->execute();

            while ($temp = $row->fetch()) {
                $productsList[] = $this->FetchProduct($temp);
            }
            return $productsList;

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
    }

    public function GetOneById($product_id)
    {
        try {
            $sql = "SELECT product_id, product_name, brand, specification, description,
                           quantity, price, image, category FROM products WHERE product_id = ?";
            $row = $this->conn->query($sql);
            $row->bindParam(1, $product_id, PDO::PARAM_INT);
            $row->execute();

            while ($temp = $row->fetch()) {
                return $this->FetchProduct($temp);
            }
        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
        return null;
    }

    public function GetAllByCategory($category)
    {
        // TODO: Implement GetAllByCategory() method.
    }

    private function FetchProduct($row)
    {
        return new Product($row["product_id"], $row["product_name"], $row["brand"], $row["specification"],
            $row["description"], $row["quantity"], $row["price"], $row["image"], $row["category"]);
    }
}