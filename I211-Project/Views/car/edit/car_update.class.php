<?php
/**
 * Author: Karen Bonilla
 * Date: 12/12/2019
 * File: car_update.class.php
 * Description:
 */

class CarUpdate extends InventoryHeader
{
    public static function displayHeader($title) {
        parent::displayHeader("Update Car")
        ?>
        <script>
            //type
        </script>


        <?php
    }

    public function display(){
        echo "Updating the vehicle was a success";
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}