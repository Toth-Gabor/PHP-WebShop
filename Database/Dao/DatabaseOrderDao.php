<?php
include_once "AbstractDao.php";
include_once __DIR__ . "/../../Database/OrderDao.php";
include_once __DIR__ . "/../../objects/product.php";

class DatabaseOrderDao extends AbstractDao implements OrderDao
{
    public $conn;

    public function __construct()
    {
        $this->conn = parent::getConnection();
    }

    public function Add($user_id, $cart_items)
    {
        try {
            $sql = "INSERT INTO orders (user_id, cart_items) VALUES (?,?);";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $user_id, PDO::PARAM_INT);
            $row->bindParam(2, $cart_items, PDO::PARAM_STR);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
    }

    public function GetAll()
    {
        // TODO: Implement GetAll() method.
    }

    public function GetOneById($order_id)
    {
        // TODO: Implement GetOneById() method.
    }

    public function UpdateById($order_id)
    {
        // TODO: Implement UpdateById() method.
    }

    public function DeleteById($order_id)
    {
        // TODO: Implement DeleteById() method.
    }

    public function GetOrdersByDate($from, $to)
    {
        // TODO: Implement GetOrdersByDate() method.
    }

    private function FetchOrder($row)
    {
        return new Order($row["order_id"], $row["user_id"], $row["cart_items"],
                         $row["status"], $row["created_at"]);
    }
}