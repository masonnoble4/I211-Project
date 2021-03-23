<?php
/**
 * Author: Mason Noble
 * Date: 12/4/2019
 * File: account_model.class.php
 * Description:
 */

class AccountModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblAccounts;
    private $car_model;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getAccount method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblAccounts = $this->db->getAccountsTable();


        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

    }
    public static function getAccountModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new AccountModel();
        }
        return self::$_instance;
    }

    public function validate_credentials($username,$password){
        try {
            $sql = "SELECT * FROM accounts WHERE username = '" . $username . "' and password = '" . $password . "' and valid =0";

            $query = $this->dbConnection->query($sql);

            //echo $sql;

            // if the query failed, return false.
            if (!$query)
                throw new Error("Error encountered with database");

            //if the query succeeded, but no account was found.
            if ($query->num_rows == 1) {
                return true;
            } else {
                //echo "YASDF";
                return false;
            }
        }catch (Error $e){
            $message = $e->getMessage();
            echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
        }

    }
}