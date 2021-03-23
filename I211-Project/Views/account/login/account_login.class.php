<?php
/**
 * Author: Mason Noble
 * Date: 12/4/2019
 * File: account_login.class.php
 * Description:
 */

class AccountLogin extends HomeHeader
{
    public function display()
    {
        parent::displayHeader('');
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //echo isset($_POST['Username']);
            if (isset($_POST['Username']) && isset($_POST['Password'])) {
                $username = $_POST['Username'];
                $password = $_POST['Password'];

                try {
                    if (trim($username == "") || trim($password == "")) {
                        throw new RequiredValueException("<br><br><br><br><p style=\"color:red\">Fatal error: A username and password are required.</p>");
                    }
                    $accountCheck = new AccountController();
                    $validator = false;
                    $validator = $accountCheck->validate_credentials($username, $password);
                    //echo $validator;
                    if ($validator == true) {
                        //echo "SESSION ID VALIDATED";
                        //cho $_SESSION;
                        $_SESSION['userID'] = uniqid();
                        //echo BASE_URL;
                        //echo $_SESSION['userID'];
                        //redirect to admin specific page
                        header("Location: " . BASE_URL . "/account/admin_mgmt_page");
                        //$accountCheck->admin_mgmt_page();
                    }else{
                        throw new InvalidLogin("<br><br><br><br><p style=\"color:red\">Invalid credentials</p>");
                    }
                } catch (RequiredValueException $e) {
                    $message = $e->getMessage();
                    echo $message;
                } catch (InvalidLogin $e) {
                    $message = $e->getMessage();
                    echo $message;
                }


            }

            }





        ?>

        <form method="post" id = "login_form">
            <legend id = "login_legend"><h2>LOGIN</h2></legend>
         <input name="Username" placeholder="Username" value="" class = "inputs">
        <br>
        <br>
        <input name="Password" placeholder="Password" value="" class = "inputs">
            <br>
            <input type="submit" value="Go" id = "login_submit">
        </form>

        <?php

        parent::displayFooter();
    }
}

class RequiredValueException extends Exception
{
    //leave it empty simply reuse features in the parent class.
}

class InvalidLogin extends Exception
{
    //leave it empty simply reuse features in the parent class.
}
