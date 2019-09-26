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
}