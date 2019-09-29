<?php
include_once "AbstractDao.php";
include_once __DIR__ . "/../../Database/UserDao.php";
include_once __DIR__ . "/../../objects/user.php";

class DatabaseUserDao extends AbstractDao implements UserDao
{
    public $conn;

    public function __construct()
    {
        $this->conn = parent::getConnection();
    }

    public function CreateUser($firstname, $lastname, $email, $contact_number, $address, $password,
                               $access_level, $access_code, $status, $created)
    {
        try {
            $sql = "INSERT INTO users (`firstname`, `lastname`, `email`, `contact_number`, `address`,
                                        `password`, `access_level`, `access_code`, `status`, `created`) 
                                        VALUES (?,?,?,?,?,?,?,?,?,?)";

            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $user_id, PDO::PARAM_STR);
            $row->bindParam(2, $user_id, PDO::PARAM_STR);
            $row->bindParam(3, $user_id, PDO::PARAM_STR);
            $row->bindParam(4, $user_id, PDO::PARAM_INT);
            $row->bindParam(5, $user_id, PDO::PARAM_STR);
            $row->bindParam(6, $user_id, PDO::PARAM_STR);
            $row->bindParam(7, $user_id, PDO::PARAM_STR);
            $row->bindParam(8, $user_id, PDO::PARAM_STR);
            $row->bindParam(9, $user_id, PDO::PARAM_STR);
            $row->bindParam(10, $user_id, PDO::PARAM_STR);
            $row->execute();

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
    }

    public function GetUserById($user_id)
    {
        try {
            $sql = "SELECT id, firstname, lastname, email, contact_number, address, password, 
                            access_level, access_code, status, created, modified FROM users WHERE id = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $user_id, PDO::PARAM_INT);
            $row->execute();

            while ($temp = $row->fetch()) {
                return $this->FetchUser($temp);
            }

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
        return null;
    }

    public function GetAllUser()
    {
        $userList = array();
        try {
            $sql = "SELECT id, firstname, lastname, email, contact_number, address, password, 
                            access_level, access_code, status, created, modified FROM users";
            $row = $this->conn->query($sql);
            $row->execute();

            while ($temp = $row->fetch()) {
                $userList[] = $this->FetchUser($temp);
            }
            return $userList;

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
    }

    public function EmailExists($email)
    {
        $email=htmlspecialchars(strip_tags($email));
        try {
            $sql = "SELECT id FROM users WHERE email = ?";
            $row = $this->conn->prepare($sql);
            $row->bindParam(1, $e-mail, PDO::PARAM_STR);
            $row->execute();

            if ($row->rowCount() == 0){
                return false;
            } else {
                return true;
            }

        } catch (PDOException $pe) {
            die("Could not connect to the database! " . $pe->getMessage());
        }
    }
    private function FetchUser($row){

        return new User($row['id'], $row['firstname'], $row['lastname'], $row['email'],
                        $row['contact_number'], $row['address'], $row['password'], $row['access_level'],
                        $row['access_code'], $row['status'],$row['created'],$row['modified'] );
    }
}