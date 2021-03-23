<?php
/**
 * Author: Mason Noble
 * Date: 12/4/2019
 * File: account_controller.class.php
 * Description:
 */

class AccountController
{
    private $account_model;
    private $car_model;

    public function __construct()
    {
        $this->account_model = AccountModel::getAccountModel();
        $this->car_model = CarModel::getCarModel();
    }



    public function validate_credentials($username, $password){
        $accountCheck = $this->account_model->validate_credentials($username, $password);

        //echo $accountCheck;

        return $accountCheck;


    }

    public function login_page(){

        $view = new AccountLogin();
        $view->display();
    }

    public function admin_mgmt_page(){
        $listCars = $this->car_model->list_car();
        //$listCars->display();

        if (!$listCars) {
            //display an error
            $message = "There was a problem displaying the cars.";
            $this->error($message);
            return;
        }

        // display all cars and ratings
        $view = new AdminMgmt();
        $view->display($listCars);
    }


}