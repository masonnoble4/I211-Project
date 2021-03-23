<?php
/**
 * Author:Brian M Gaitan
 * Date: 11/19/2019
 * File: list_car_index.class.php
 * Description:
 */

class ListCars
{
    public function display($cars) {
    //Display Car header
        $header = new CarIndexView();
        $header->displayHeader('');
        ?>

        <div id="main-header"> Cars Inventory</div>
        <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/application.css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="grid-container">
            <?php echo "<div id='login_link'><a href='",BASE_URL, "/account/login_page'>Admin Login</a></div>";?>
            <div id="suggestionDiv"></div>
            <?php
            //code for the search feature\\

            /*$terms = $_GET['query-terms'];
            $search = new CarSearch();
            //$carSorted = new CarController();
                //$carSorted->car_model->searchCars();
            $search->display($terms, $cars);*/

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
                          <a href='",BASE_URL, "/car/displayleaveRating/$id'>Ratings:</a></p>";
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


        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/auto_suggestion.js"></script>
        <?php
        //display page footer
        $footer = new CarIndexView();
        $footer->displayFooter();


    } //end of display method
}

