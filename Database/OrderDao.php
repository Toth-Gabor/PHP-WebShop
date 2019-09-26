<?php


interface OrderDao
{
    public function GetAll();
    public function GetOneById($order_id);
    public function UpdateById($order_id);
    public function DeleteById($order_id);
    public function GetOrdersByDate($from, $to);
}