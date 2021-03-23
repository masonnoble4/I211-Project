<?php
/**
 * Author: Karen Bonilla
 * Date: 12/3/2019
 * File: welcome_controller.class.php
 * Description:
 */

class WelcomeController
{
    public function index()
    {
        $view = new WelcomeIndex();
        $view -> display();
    }
}