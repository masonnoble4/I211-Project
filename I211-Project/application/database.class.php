<?php
/**
 * Author: Mason Noble
 * Date: 11/19/2019
 * File: database.class.php
 * Description:
 */

class Database
{
    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => '********',
        'password' => '********',
        'database' => 'car_inventory_db',
        'tblCar' => 'cars',
        'tblCarRating' => 'car_ratings',
        'tblAccounts' => 'accounts'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
            $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores movies
    public function getCarTable() {
        return $this->param['tblCar'];
    }

    //returns the name of the table storing movie ratings
    public function getCarRatingTable() {
        return $this->param['tblCarRating'];
    }

    //returns the name of the table that stores accounts
    public function getAccountsTable() {
        return $this->param['tblAccounts'];
    }


}
