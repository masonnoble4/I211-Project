<?php
/**
 * Author: Karen Bonilla
 * Date: 11/19/2019
 * File: index.php
 * Description:
 */

/*
 * Author: Louie Zhu
 * Date: March 16, 2019
 * Name: index.php
 * Description: The homepage
 */
//load application settings
require_once("application/config.php");

//load autoloader
require_once("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();


/*
require_once ("vendor/autoload.php");
//create an object of UserController
$user_controller = new CarController();

//include code in vendor/autoload.php file


//add your code below this line to complete this file

//default action is index
$action = "listCars";

//retrieve value of index from a query string variable
if(isset($_GET['action']) && !empty($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action){
    case "listCars":
        $user_controller->listCars();
        break;
    case "checkCar":
        $user_controller->checkCar();
        break;
    case "deleteCar":
        $user_controller->deleteCar();
        break;
    case "do_delete":
        $user_controller->do_delete();
        break;
    case "editCar":
        $user_controller->editCar();
        break;
    case "updateCar":
        $user_controller->updateCar();
        break;
    case "error":
        $message = "We are sorry, but an error has occurred.";
        $user_controller->error($message);
        break;
}*/
