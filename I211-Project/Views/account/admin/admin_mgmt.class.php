<?php
/**
 * Author: Mason Noble
 * Date: 12/4/2019
 * File: admin_mgmt.class.php
 * Description:
 */

class AdminMgmt
{


    public function display($cars) {
        /*if(!isset($_SESSION['userID'])) {
            //redirect to admin specific view if session is valid

        }*/
        //Display Car header
        //$header = new Header();
        //$header->displayHeader();

        $header = new CarIndexView();
        $header->displayHeader('');
        ?>

        <div id="main-header">Admin View</div>
        <link type='text/css' rel='stylesheet' href='../www/css/application.css' />
        <script src="../js/auto_suggestion.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <div class="grid-container">
            <?php echo "<div id='create_listing'><a href='",BASE_URL, "/car/displayaddCar'>Create a new car listing</a></div>";?>
            <div id="adminview">Admin View</div>
            <?php

            /*$username= 'admin';
            $password= 'password';
            $test = new AccountController();
            echo $test->validate_credentials($username,$password);*/
            if ($cars === 0) {
                echo "No cars were found.<br><br><br><br><br>";
            } else {
                //display cars in a grid; four cars per row
                foreach ($cars as $i => $car) {
                    $id = $car->getId();
                    $make = $car->getmake();
                    $model = $car->getmodel();
                    $price = $car->getPrice();
                    $color=$car->getColor();
                    $mileage=$car->getMileage();
                    $year= $car->getYear();
                    $image = $car->getImage();
                    if($car->getRating() === null){
                        $stars = 0;
                    }else{
                        $stars = $car->getRating();
                    }

                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image ="../www/img/". $image;
                    }
                    if ($i % 3 == 0) {
                        echo "<div class='row'>";
                    }
                    $spanPercent = ($stars*100)/5;

                    echo "<div class='col'><p><a href='", BASE_URL, "/car/detail/$id'><img src='" . $image .
                        "'><br></a><span>Make: $make<br>Model: $model<br>Price: $price<br>Mileage: $mileage<br>Year: " . $year . " </span>
                          <a href='",BASE_URL, "/car/leave_rating/$id'>Ratings:</a></p>";
                    ?>
                    <span class="score">
            <div class="score-wrap">
        <span class="stars-active" style="width: <?php echo ($spanPercent)."%"?>">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
        </span>
                <span class="stars-inactive">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
        </span>
            </div>
            </span>

                    <?php


                    echo "</div>";
                    //echo $spanPercent."%";
                    ?>

                    <?php
                    if ($i % 3 == 2 || $i == count($cars) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>


        <?php
        //display page footer
        $footer = new Header();
        $footer->displayFooter();


    } //end of display method
}