<?php
include_once __DIR__ . "/../../Database/Dao/DatabaseOrderDao.php";
include_once __DIR__ . "/../../services/OrderServices.php";

class SimpleOrderServices implements OrderServices{

    private $orderDao;

    public function __construct()
    {
        $this->orderDao = new DatabaseOrderDao();
    }

    function AddOrder($user_id, $cart_items)
    {
        $this->orderDao->Add($user_id, $cart_items);
    }

}