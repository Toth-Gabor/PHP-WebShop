<?php


interface UserServices
{
    public function AddUser($firstname, $lastname, $email, $contact_number, $address, $password,
                               $access_level, $access_code, $status, $created);
    public function ReadUserById($user_id);
    public function ReadAllUser();
    public function CheckEmailExists($email);
    public function ReadUserByEmail($email);
}