<?php
/**
 * Author: Mason Noble
 * Date: 12/4/2019
 * File: account.class.php
 * Description:
 */

class Account
{
    //private properties of an account object
    private $id, $userame, $password, $valid;

    //the constructor that initializes all properties
    public function __construct($userame, $password) {
        $this->username = $userame;
        $this->password = $password;

    }

    //get the id of an account
    public function getId() {
        return $this->id;
    }

    //get the username of an account
    public function getUsername() {
        return $this->userame;
    }

    //get the password of an account
    public function getPassword() {
        return $this->password;
    }
}