<?php
include_once "AbstractDao.php";
include_once __DIR__ . "/../../Database/ProductDao.php";
include_once __DIR__ . "/../../objects/product.php";

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
                           price, quantity, image, category FROM products WHERE product_id = ?";
            $row = $this->conn->prepare($sql);
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
        try {
            $productsList = array();
            $sql = "SELECT product_id, product_name, brand, specification, description, 
                           quantity, price, image, category FROM products WHERE category = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $category, PDO::PARAM_STR);
            $row->execute();

            while ($temp = $row->fetch()) {
                $productsList[] = $this->FetchProduct($temp);
            }
            return $productsList;

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
    }


    public function GetAllByIds($productIdList)
    {
        try {
            $sql = "SELECT product_id, product_name, brand, specification, description,
                           price, quantity, image, category FROM products WHERE product_id IN (?)";
            $row = $this->conn->prepare($sql);
            $param = "{" . implode(', ', $productIdList) . "}";
            $row->execute(array($param));

            while ($temp = $row->fetch()) {
                return $this->FetchProduct($temp);
            }
        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
        return null;
    }

    public function DecrementQty($product_id, $cart_qty)
    {
        $current_qty = $this->GetCurrentQuantity($product_id);
        $new_qty = $current_qty - $cart_qty;
        $this->UpdateQty($new_qty, $product_id);
    }

    public function IncrementQty($product_id, $cart_qty)
    {
        $current_qty = $this->GetCurrentQuantity($product_id);
        $new_qty = $current_qty + $cart_qty;
        $this->UpdateQty($new_qty, $product_id);
    }

    public function UpdateQty($new_qty, $product_id)
    {
        try {
            $sql = "UPDATE products SET quantity = ?  WHERE product_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $new_qty, PDO::PARAM_INT);
            $row->bindParam(2, $product_id, PDO::PARAM_INT);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
    }

    public function GetCurrentQuantity($product_id)
    {
        try {
            $sql = "SELECT quantity FROM products WHERE product_id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $product_id, PDO::PARAM_INT);
            $row->execute();

            while ($quantity = $row->fetch()) {
                return $quantity;
            }
        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
        return null;
    }

    private function FetchProduct($row)
    {
        return new Product($row["product_id"], $row["product_name"], $row["brand"], $row["specification"],
            $row["description"], $row["price"], $row["quantity"], $row["image"], $row["category"]);
    }
}