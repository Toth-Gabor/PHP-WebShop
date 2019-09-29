<?php
// TODO: methods move to Dbo sevice
class User{

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $contact_number;
    private $address;
    private $password;
    private $access_level;
    private $access_code;
    private $status;
    private $created;
    private $modified;


    public function __construct($id, $firstname, $lastname, $email, $contact_number, $address, $password, $access_level, $access_code, $status, $created, $modified)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->contact_number = $contact_number;
        $this->address = $address;
        $this->password = $password;
        $this->access_level = $access_level;
        $this->access_code = $access_code;
        $this->status = $status;
        $this->created = $created;
        $this->modified = $modified;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getContactNumber()
    {
        return $this->contact_number;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAccessLevel()
    {
        return $this->access_level;
    }

    public function getAccessCode()
    {
        return $this->access_code;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getModified()
    {
        return $this->modified;
    }
    // TODO: the read users button at navbar not wornking! refactor the code below!!!!!
    // read all user records
    function readAll($from_record_num, $records_per_page){

        // query to read all user records, with limit clause for pagination
        $query = "SELECT
                id,
                firstname,
                lastname,
                email,
                contact_number,
                access_level,
                created
            FROM " . $this->table_name . "
            ORDER BY id DESC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind limit clause variables
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values
        return $stmt;
    }

    // used for paging users
    public function countAll(){

        // query to select all user records
        $query = "SELECT id FROM " . $this->table_name . "";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // return row count
        return $num;
    }
}