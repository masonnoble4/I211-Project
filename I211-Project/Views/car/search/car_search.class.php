<?php
/**
 * Author: Karen Bonilla
 * Date: 12/2/2019
 * File: car_search.class.php
 * Description:
 */

class CarSearch extends CarIndexView
{
    /*
         * the displays accepts an array of car objects and displays
         * them in a grid.
         */

    public function display($terms, $cars) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"><br><br><br>Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($cars)) ? "( 0 - 0 )" : "( 1 - " . count($cars) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($cars === 0) {
                echo "<p style=\"color:white\">No car was found.</p><br><br><br><br><br>";
            } else {
                //display cars in a grid; six cars per row
                //Todo: change to the correct identifiers given in table
                foreach ($cars as $i => $car) {
                    $id = $car->getId();
                    $make = $car->getMake();
                    $model = $car->getModel();
                    $price = $car->getPrice();
                    $year = $car->getYear();
                    $color = $car->getColor();
                    $mileage = $car->getMileage();
                    $image = $car->getImage();
//                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/www/img/" . $image;
//                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col' id = 'col'><p><a href='" . BASE_URL . "/car/detail/$id'><img src='" . $image .
                        "'></a><span>$make<br>$model<br>" . "Price: $" .$price . "<br> Year:" .  $year . "<br> Color:" . $color. "<br> Mileage:".  $mileage . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($cars) - 1) {
                        echo "</div>";
                    }
                    //$rating_id = $cars->getRatingId();
                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/car/index">Go to car list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}