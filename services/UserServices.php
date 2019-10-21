<?php


interface UserServices
{
    public function AddUser($firstname, $lastname, $email, $contact_number, $address, $password,
                               $access_level, $access_code, $status, $created);
    public function UpdateUserDetails($user_id, $firstName, $lastName, $email, $contact_number, $address);
    public function ReadUserById($user_id);
    public function ReadAllUser();
    public function CheckEmailExists($email);
    public function ReadUserByEmail($email);
    public function ReadUsersBetween($from_record_num, $records_per_page);
}