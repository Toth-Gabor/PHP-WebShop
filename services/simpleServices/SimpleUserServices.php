<?php
include_once __DIR__ . "/../../Database/Dao/DatabaseUserDao.php";
include_once __DIR__ . "/../../services/UserServices.php";

class SimpleUserServices implements UserServices
{
    private $userdao;

    public function __construct()
    {
        $this->userdao = new DatabaseUserDao();
    }

    public function AddUser($firstname, $lastname, $email, $contact_number, $address,
                            $password, $access_level, $access_code, $status, $created)
    {
        $this->userdao->CreateUser($firstname, $lastname, $email, $contact_number, $address,
                                   $password, $access_level, $access_code, $status, $created);
    }

    public function ReadUserById($user_id)
    {
        return $this->userdao->GetUserById($user_id);
    }

    public function ReadAllUser()
    {
       return $this->userdao->GetAllUser();
    }

    public function CheckEmailExists($email)
    {
        return $this->userdao->EmailExists($email);
    }

    public function ReadUserByEmail($email)
    {
        return $this->userdao->GetUserByEmail($email);
    }


}